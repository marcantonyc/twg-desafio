<x-app-layout>
  <x-slot name="header">
    <div class="flex">

      <h2 class="font-semibold text-xl text-gray-800 leading-tight whitespace-nowrap">
        {{ __('Show Task') }}
      </h2>
      <div class="flex w-full h-full align-center justify-end ">
        <a class="bg-blue-600 py-2 px-4 rounded-md text-white"href="{{ route('tasks.index')}}">
          Task List
        </a>
      </div>
      
    </div>
  </x-slot>
  
  @if ($errors->any())
    <div class=" w-full py-2 px-8 ">
      <div class=" rounded-md bg-red-400 px-4">
          <ul>
              @foreach ($errors->all() as $error)
                  <li class="text-white">{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    </div>
  @endif
    
  @if ($task != null)
    <div class="w-full h-full">
      <div class="flex justify-center w-full">
        <div class="w-1/2 max-w-xl bg-white rounded-md shadow my-4 p-4">
          <div class="w-full flex justify-center pt-2">
            <p class="text-xs text-gray-500">ID</p>
          </div>
          <div class="w-full flex justify-center">
            <p class="text-xl">
              {{ $task->id }}
            </p>
          </div>
          <div class="w-full flex justify-center pt-4">
            <p class="text-xs text-gray-500">Nombre</p>
          </div>
          <div class="w-full flex justify-center">
            <p class="text-xl">
              {{ $task->name}}
            </p>
          </div>
          <div class="w-full flex justify-center pt-4">
            <p class="text-xs text-gray-500">Description</p>
          </div>
          <div class="w-full flex justify-center bg-gray-50 rounded-md py-4 px-2">
            <p>
              {{ $task->description }}
            </p>
          </div>
          <div class="w-full flex justify-center pt-4">
            <p class="text-xs text-gray-500">Max Ejecution Date</p>
          </div>
          <div class="w-full flex justify-center pb-4">
            <p class="text-xl">
              {{ $task->max_ejecution}}
            </p>
          </div>
        </div>
      </div>
    
      <div class="flex justify-center w-full">
        <div class="w-1/2 max-w-xl bg-white rounded-md shadow my-4 p-4">
          <div class="w-full flex justify-center pt-2">
            <p class="text-2xl">Agregar Log</p>
          </div>
          <form action="{{ route('logs.store')}}" method="POST">
            @csrf
            <div class="mt-1">
              <input type="hidden" name="task_id" id="task_id" value=" {{$task->id}}" />
              <textarea id="log_description" name="log_description" value="{{ old('log_description')}}" rows="3" class="p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="logs"></textarea>
            </div>
            <div class="w-full flex justify-center pt-4">
              <button type="submit" class="bg-blue-600 hover:bg-blue-400 rounded-md w-full py-2 text-white">Add</button>
            </div>
          </form>
        </div>
      </div>
    
      <div class="flex justify-center w-full">
        <div class="w-1/2 max-w-xl bg-white rounded-md shadow my-4 p-4">
          <div class="w-full flex justify-center pt-2">
            <p class="text-2xl">Logs</p>
          </div>
          <div class="">
            <table class="w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                @if (!empty($task->logs)) 
                  @forelse ($task->logs as $item)
                    <tr >
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $item->description }}</div>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">No hay registros para mostrar.</div>
                      </td>
                    </tr>
                  @endforelse
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  @else
        
    @endif
    
      
      
  
  </x-app-layout>
  