<x-app-layout>
  <x-slot name="header">
    <div class="flex">

      <h2 class="font-semibold text-xl text-gray-800 leading-tight whitespace-nowrap">
        {{ __('Tasks List') }}
      </h2>
      <div class="flex w-full h-full align-center justify-end ">
        <a class="bg-blue-600 py-2 px-4 rounded-md text-white"href="{{ route('tasks.create')}}">
          Create Task
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
  <div>
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto">
        <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assigned user</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Max Ejecution Date</th>
                  <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <form action="{{route('tasks.store')}}" method="POST">
                  @csrf
                  <tr>
                    <td class="px-6 py-2 whitespace-nowrap">
                      <div class="text-sm font-medium text-gray-900">
                        <div class="mt-1 flex rounded-md shadow-sm">
                          <input type="text" name="task_name" id="task_name" value="{{ old('task_name')}}"class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Task example" />
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap">
                      <div class="text-sm font-medium text-gray-900">
                        <div class="mt-1 flex rounded-md shadow-sm">
                          <input type="text" name="task_description" id="task_description" value="{{ old('task_description')}}" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Task description" />
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap">
                      <div class="text-sm font-medium text-gray-900">
                        <div class="mt-1 flex rounded-md shadow-sm">
                          <input type="text" name="task_assigned_user" id="task_assigned_user" value="{{ old('task_assigned_user')}}" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="user id" />
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap">
                      <div class="text-sm font-medium text-gray-900">
                        <div class="mt-1 flex rounded-md shadow-sm">
                          <input type="date" name="task_max_ejecution" id="task_max_ejecution" value="{{ old('task_max_ejecution')}}" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"  />
                        </div>
                      </div>
                    </td>
                    
                    <td class="px-6 py-2 whitespace-nowrap text-right text-sm font-medium">
                      <button type="submit" class="hover:bg-blue-400 py-2 px-4 bg-blue-600 rounded-md text-white">Save</a>
                    </td>
                  </tr>
                </form>
                  @if (!empty($tasks))
                    @forelse ($tasks as $item)
                      <tr
                        @if ($current_date > $item->max_ejecution)
                            class="bg-red-100"
                        @else
                            class="bg-green-100"
                        @endif
                      >
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm font-medium text-gray-900">
                            {{ $item->name }}
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm font-medium text-gray-900">
                            {{ $item->description }}
                          </div>
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm font-medium text-gray-900">
                            {{ $item->assigned_user }}
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm font-medium text-gray-900">
                            {{ $item->max_ejecution }}
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          
                          @if (Auth::check())
                            @if ( $item->assigned_user == Auth::id() )
                              <a href="{{ route('tasks.show',['task' => $item])}}" class="text-indigo-600 hover:text-indigo-900">Ver</a>  
                            @endif
                              
                          @endif
                        </td>
                      </tr>
        
                    @empty
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm font-medium text-gray-900">No hay registros para mostrar.</div>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                  @endforelse 
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
    

</x-app-layout>
