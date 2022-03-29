<x-app-layout>

    <x-slot name="header">
        Todas as categorias
    </x-slot>

       @if(isset($categoria))

           <form action="{{route("categoria.create")}}">
               <x-button>
               Criar
               </x-button>
           </form>
        @foreach($categoria as $c)
            <div>
                {{$c->descricao}}

                <a href="{{route('categoria.edit', $c->id)}}">
                    Alterar
                </a>
                <form action="{{route('categoria.destroy', $c->id)}}" method="POST">
                    @csrf
                    @Method("DELETE")
                    <div class="mt-5">
                        <x-button>Excluir</x-button>
                    </div>
                </form>
            </div>
        @endforeach
       @endif

</x-app-layout>
