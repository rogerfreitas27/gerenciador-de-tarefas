<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('snippets.head')
</head>

<body>
    @include('snippets.menu')

    <section class="espaco">
        <div class="container">

            <div class="card text-center">
                <div class="card-header">
                    <h2>
                       Remover Dev
                    </h2>
                    @include('snippets.error')
    @if(session('mensagem'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>{{session('mensagem')}}</strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
   @endif
                </div>
                <div class="card-body">




                    <form action="{{ route('tarefaRemoveDev') }}" method="post">



                        <br />
                        <input type="hidden" id="id" name="id" value="{{ $tarefa->id ?? old('id') }}"
                            formControlName="id">
                        @csrf


                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Devs</label>
                            <select class="form-select" name="id" id="selectDevInserir"
                                aria-label="Default select example">
                                @foreach ($tarefas as $item)
                                    <option value={{ $item->id ?? old('projeto_id') }}>{{ $item->nome ?? '' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Devs envolvidos</label>
                            <textarea class="form-control" name="textAreaInserir" id="textAreaInserir" rows="5">
@foreach ($tarefas as $item)
{{ $item->nome ?? '' }}
@endforeach
</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Remover</button>

                    </form>
                </div>
                <br />
            </div>

        </div>
    </section>
</body>

</html>
