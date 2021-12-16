<x-app-layout>
  <x-slot name="header">
    <div class="flex">

      <h2 class="font-semibold text-xl text-gray-800 leading-tight whitespace-nowrap">
        {{ __('Create Task') }}
      </h2>
      <div class="flex w-full h-full align-center justify-end ">
        <a class="bg-blue-600 py-2 px-4 rounded-md text-white"href="{{ route('tasks.index')}}">
          Tasks List
        </a>
      </div>
      
    </div>
  </x-slot>
  
  @if ($errors->any())
    <div class=" w-full py-2 px-8 flex align-center justify-center">
      <div class=" w-full max-w-xl rounded-md bg-red-400 px-4">
          <ul>
              @foreach ($errors->all() as $error)
                  <li class="text-white">{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    </div>
  @endif

  <div class="w-full h-full flex justify-center">
    <div class="w-1/2 max-w-xl h rounded-md shadow my-4 bg-white">
      <form action="{{ route('tasks.store')}}" method="POST">
        @csrf
        <div class="py-4 px-4">
          <h2 class="text-lg font-bold text-gray-600">Create task</h2>
          <div class="py-4">
            <label for="task_name" class="block text-sm font-medium text-gray-700"> Name </label>
            <div class="mt-1 flex rounded-md shadow-sm">
              <input type="text" name="task_name" id="task_name" value="{{ old('task_name') }}" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Task example" />
            </div>
          </div>
          <div class="py-4">
            <label for="task_description" class="block text-sm font-medium text-gray-700"> Description </label>
            <div class="mt-1">
              <textarea id="task_description" name="task_description" value="{{ old('task_description')}}" rows="3" class="p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="this is a task"></textarea>
            </div>
          </div>
          <div class="py-4">
            <label for="task_assigned_user" class="block text-sm font-medium text-gray-700"> Assigned User </label>
            <div class="mt-1 flex rounded-md shadow-sm">
              <input type="text" name="task_assigned_user" id="task_assigned_user" value="{{ old('task_assigned_user')}}" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="user id" />
            </div>
          </div>
          <div class="py-4">
            <label for="task_max_ejecution" class="block text-sm font-medium text-gray-700"> Max Ejecution Date </label>
            <div class="mt-1 flex rounded-md shadow-sm">
              <input type="date" name="task_max_ejecution" id="task_max_ejecution" value="{{ old('task_max_ejecution') }}" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Task example" />
            </div>
          </div>
        </div>
        <div class="px-4 py-4 bg-gray-50 text-right sm:px-6 rounded-b-md">
          <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
        </div>
      </form>
    </div>
  </div>
  
  

</x-app-layout>
