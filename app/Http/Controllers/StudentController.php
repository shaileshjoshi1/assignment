<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Image;
use App\Http\Middleware\CheckApiToken;

use DB;

use Imagefile;

class StudentController extends Controller
{
	public function __construct()
	{
		$this->middleware('checkapitoken');
	}
		
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$students = DB::table('students')->join('images','students.id','=','images.id')->get();
		
		return  response()->json($students, 201);

        //return view('index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		//return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
			'parent_name'=>'required',
            'email_id'=>'required',
			'mobile_number'=>'required',
			'standard'=>'required',
			'course'=>'required',
			//'document1'=>'required|image|size:2000',
			//'document2'=>'required',
			
        ]);
		

	try {
			$originalImage = $request->file('document1');
			$path1 = '';
			if(!empty($_FILES['document1']['name'])){
				$file1 = Imagefile::make($originalImage->getRealPath());
				$fileName = time().'_.'.$originalImage->getClientOriginalExtension();
				$request->file('document1')->move(public_path('document1/'), $fileName);
				$path1 = '/document1/' .$fileName;
			}
			
			$student = new Student([
				'first_name' => $request->get('first_name'),
				'last_name' => $request->get('last_name'),
				'parent_name' => $request->get('parent_name'),
				'email_id' => $request->get('email_id'),
				'mobile_number' => $request->get('mobile_number'),
				'standard' => $request->get('standard'),
				'course' => $request->get('course'),
				'document1' => $path1
				
			]);
			
			$student->save();
			$file_multiples = $request->file('document2');
			
			 // Handle multiple file upload
			 if( !empty($_FILES['document2']['name']) ){
				foreach($file_multiples as $key => $filem) {
					$file2 = Imagefile::make($filem->getRealPath());
					$fileName2 = mt_rand(999,999999)."_".time().'_.'.$filem->getClientOriginalExtension();
					// dd($request->file('img')->getMaxFilesize());
					$filem->move(public_path('document2/'), $fileName2);
						//$path = $request->document2[$key]->store('public/document2/');
						//$path = basename($path);
						$path2 ='/document2/' .$fileName2;
						// store to database.
						$f_image = new Image();
						$f_image->id = $student->id;
						$f_image->document2 = $path2;
						$f_image->save();
				}
			 }
		 
		} catch (\Illuminate\Database\QueryException   $ex) { 
			return response()->json($ex->getMessage(),422 );
		} catch (Exception $ex) { // Anything that went wrong
			return response()->json($ex->getMessage(),500 );
		}

		return response()->json("'Student added", 201);
		
		
      //  return redirect('/students')->with('success', 'Student saved!');
		
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		
		
		$student = DB::table('students')->join('images','students.id','=','images.id')->where(['students.id' => $id])->get();
		
		return response()->json($student, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		
		//$student = Student::find($id);
		//$images = Image::where(['id' => $id])->get();
		//return response()->json($student, 201);
       // return view('edit', compact('student'),['images' => $images ]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		$request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
			'parent_name'=>'required',
            'email_id'=>'required',
			'mobile_number'=>'required',
			'standard'=>'required',
			'course'=>'required',
			
        ]);
		
	try {
			$student = Student::find($id);

			$student->first_name =  $request->get('first_name');
			$student->last_name = $request->get('last_name');
			$student->parent_name = $request->get('parent_name');
			$student->email_id = $request->get('email_id');
			$student->mobile_number = $request->get('mobile_number');
			$student->standard = $request->get('standard');
			$student->course = $request->get('course');
			
			$originalImage = $request->file('document1');
			
			if(!empty($_FILES['document1']['name'])){
				$file1 = Imagefile::make($originalImage->getRealPath());
				$fileName = time().'_.'.$originalImage->getClientOriginalExtension();
				// dd($request->file('')->getMaxFilesize());
				$request->file('document1')->move(public_path('document1/'), $fileName);
				$path1 = '/document1/' .$fileName;
				$student->document1 = $path1;
			}
			
			
			
			 
			 $file_multiples = $request->file('document2');
		
			$file_image = Image::find($id);
			 // Handle multiple file upload
			 if( !empty($_FILES['document2']['name']) ){
				foreach($file_multiples as $key => $filem) {
					$file2 = Imagefile::make($filem->getRealPath());
					$fileName2 = mt_rand(999,999999)."_".time().'_.'.$filem->getClientOriginalExtension();
					$filem->move(public_path('document2/'), $fileName2);
					$path2 ='/document2/' .$fileName2;
					// store to database.
					
					if($file_image){
						$file_image = Image::find($id);
						$file_image->id = $id;
						$file_image->document2 = $path2;
						$file_image->save();
					}else{
						$f_image = new Image();
						$f_image->id = $id;
						$f_image->document2 = $path2;
						$f_image->save();
					}
				}
			 }
			 
			 $student->save();
			 
		} catch (\Illuminate\Database\QueryException   $ex) { 
			return response()->json($ex->getMessage(),422 );
		} catch (Exception $ex) { // Anything that went wrong
			return response()->json($ex->getMessage(),500 );
		}	 
		 return response()->json('Student updated', 200);
		//return redirect('/students')->with('success', 'Student updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		try {
			$student = Student::find($id);
			$student->delete();
			$image_t = Image::find($id);
			$image_t->delete();
		} catch (\Illuminate\Database\QueryException   $ex) { 
			return response()->json($ex->getMessage(),422 );
		} catch (Exception $ex) { // Anything that went wrong
			return response()->json($ex->getMessage(),500 );
		}	
		return response()->json('Student deleted', 200);
       // return redirect('/students')->with('success', 'Student deleted!');
		
    }
}
