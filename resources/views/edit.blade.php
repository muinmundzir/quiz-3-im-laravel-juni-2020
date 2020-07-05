@extends('layouts.master')

@section('content')
<div class="col-lg-6 m-auto">
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Artikel</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('artikel.delete', $article->id)}}" method="post">
            @csrf    
                <div class="form-group row">
                    <div class="col-3">
                        <label for="judul" class="p-2 text-md">Judul:</label>
                    </div>
                    <div class="col">
                        <input type="text" name="judul" class="form-control form-control-user" value="{{$article->judul}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="isi" class="p-2 text-md">Isi:</label>
                    </div>
                    <div class="col">
                        <textarea type="text" name="isi" class="form-control form-control-user">{{$article->isi}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label for="tag" class="p-2 text-md">Tag:</label>
                    </div>
                    <div class="col">
                        <input type="text" name="tag" class="form-control form-control-user" value="{{$article->tag}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col d-inline-flex justify-content-end">
                    <form action="{{ route('artikel.update', $article->id)}}">
                    @method('PUT')
                    @csrf
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                    </div>
                </div>
            </form> 
        </div>
    </div> 
</div>
@endsection