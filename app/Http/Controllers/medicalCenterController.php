<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\medicalCenter;
use Mail;
class medicalCenterController extends Controller
{
    public function confirmMedicalCenter($id,$code){
      $medicalCenter = medicalCenter::find($id);

      if($medicalCenter->confirmation_code == $code){
          $medicalCenter->confirmation_code = null;
          $medicalCenter->confirmed = 'true';
          $medicalCenter->save();

          return redirect()->route('home')->with('success','Se ha Registrado el Centro Medico: '.$medicalCenter->tradename.' de Forma Satisfactoria');
      }

         return redirect()->route('successRegMedicalCenter',$medicalCenter->id)->with('warning', 'No se pudo verificar la autenticacion del usuario,por favor presione el boton "Reenviar Correo de Confirmación" para intentarlo Nuevamente.');


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function MedicalCenterList(){
       $medicalCenters = medicalCenter::orderBy('id','desc')->paginate(10);
       return view('medicalCenter.medicalCenterList')->with('medicalCenters',$medicalCenters);
     }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('medicalCenter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $code = str_random(25);
        $request->validate([
          'idMedicalCenter'=>'nullable',
          'tradename'=>'required|unique:medical_centers',
          'activePlan'=>'nullable',//ARREGLAAAAAAAAAAAAAAAAAAARRRRRRRRRRRRRRRRRr
          'emailAdmin'=>'required|unique:medical_centers',
          'nameAdmin'=>'required',
          'phone'=>'required|numeric',
          'city'=>'required',
          'billingData'=>'required',
          'meansOfRecords'=>'required',
          'numberPromoter'=>'required',

        ]);


        $medicalCenter = new medicalCenter;
        $medicalCenter->fill($request->all());
        $medicalCenter->confirmation_code = $code;
        $medicalCenter->save();

        Mail::send('mails.confirmMedicalCenter',['medicalCenter'=>$medicalCenter,'code'=>$code], function($msj) use ($medicalCenter){
           $msj->subject('Médicos Si');
           $msj->to($medicalCenter->emailAdmin);

      });

        return redirect()->route('successRegMedicalCenter',$medicalCenter->id);
    }

    public function successRegMedicalCenter($id){
      $medicalCenter = medicalCenter::find($id);
      return view('medicalCenter.successReg')->with('medicalCenter',$medicalCenter);
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
    }
}
