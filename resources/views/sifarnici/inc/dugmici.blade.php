<a class="btn btn-success btn-sm" 
id="dugmeDetalj" href="{{ route('zaposleni.detalj', $model->id) }}">
<i class="fa fa-eye"></i>
</a>
<a class="btn btn-info btn-sm" 
id="dugmeIzmena" href="{{ route('zaposleni.izmena.get', $model->id) }}">
<i class="fa fa-pencil"></i>
</a>
<button class="btn btn-danger btn-sm otvori-brisanje" 
data-toggle="modal" data-target="#brisanjeModal"
value="{{ $model->id }}">
<i class="fa fa-trash"></i>
</button>