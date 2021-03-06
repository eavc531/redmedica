@extends('layouts.app')

@section('content')
<section class="box-register">
		<div class="container">
			<div class="register">
				<div class="row">
					<div class="col-12 mb-5">
						<h2 class="text-center font-title">Centros médicos</h2>
					</div>
				</div>
				<div class="row">
						<table class="table table-responsive">
						  <thead class="thead-color">
						    <tr>
						      <th class="text-center">#</th>
						      <th class="text-center">Nombre del Centro medico</th>
						      <th class="text-center">Nombre del administrador</th>
									 <th class="text-center">Email del administrador</th>
						      <th class="text-center">Ciudad</th>
						      <th class="text-center">Opciones</th>

						    </tr>
						  </thead>
						  <tbody>
								@foreach ($medicalCenters as $medicalCenter)
								<tr>
									<th scope="row">{{$medicalCenter->id}}</th>
									<td class="text-center">{{$medicalCenter->tradename}}</td>
									<td class="text-center">{{$medicalCenter->nameAdmin}}</td>
									<td class="text-center">{{$medicalCenter->emailAdmin}}</td>
									<td class="text-center">{{$medicalCenter->city}}</td>
									<td><div class="btn-group" role="group" aria-label="...">
										<div class="row">
											<div class="col-12">
												<a class="btn btn-secondary  text-center" data-toggle="tooltip" data-placement="top" title="Ver mas" role="button" href=""><i class="fas fa-bars"></i>
												</a>
											</div>
										</div>
									</div>
								</td>

								@endforeach

						  </tbody>
						</table>
				</div>

			</div>
		</div>
	</section>

<footer>
	<div class="section-footer">
		<div class="row align-items-center nomargin p-1">
			<div class="col-lg-6 col-sm-6 col-12 text-center nopadding">
				<a href="" class="p-2"><img class="buttons-footer" src="img/botones-medicossi-13.png" alt=""></a>
				<a href="" class="p-2"><img class="buttons-footer" src="img/botones-medicossi-14.png" alt=""></a>
				<a href="" class="p-2"><img class="buttons-footer" src="img/botones-medicossi-15.png" alt=""></a>
				<a href="" class="p-2"><img class="buttons-footer" src="img/botones-medicossi-16.png" alt=""></a>
			</div>
			<div class="col-lg-6 col-sm-6 col-12 text-center nopadding">
				<span class="font-footer"><b>MedicosSi</b> siempre encontrarás tu mejor opción.</span>
			</div>
		</div>
	</div>
</footer>
@endsection
