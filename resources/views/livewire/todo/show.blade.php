<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Item
              </th>
              <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Status
              </th>
              <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Actions
              </th>
              <th scope="col" class="px-6 py-3 bg-gray-50">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($list as $item)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="ml-2">
                    <div class="text-sm font-medium text-gray-900">
                    {{ $item->description }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="ml-2">
                    <div class="text-sm font-medium text-gray-900">
                    @if($item->done)Done @else To Do @endif
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                @if($item->done)
                    <button wire:click="markAsToDo({{ $item->id }})" class="bg-red-100 text-red-600 px-6 rounded-full">
                        Undo
                    </button>
                @else
                    <button wire:click="markAsDone({{ $item->id }})" class="bg-gray-800 text-white px-6 rounded-full">
                        Mark "Done"
                    </button>
                @endif
                <!-- Delete User Confirmation Modal -->
                <x-jet-dialog-modal :id="$item->id" wire:model="confirmingTodoDeletion">
                    <x-slot name="title">
                        {{ __('Delete Todo') }}
                    </x-slot>

                    <x-slot name="content">
                        {{ __('Are you sure you want to delete this todo?  This cannot be undone.') }}
                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$toggle('confirmingTodoDeletion')" wire:loading.attr="disabled">
                            {{ __('Nevermind') }}
                        </x-jet-secondary-button>

                        <x-jet-danger-button class="ml-2" wire:click="deleteItem( {{$item->id}} )" wire:loading.attr="disabled">
                            {{ __('Delete Todo') }}
                        </x-jet-danger-button>
                    </x-slot>
                </x-jet-dialog-modal>

                <button wire:click="confirmTodoDeletion" class="bg-red-100 text-red-600 px-6 rounded-full">
                    Delete
                </button>
              </td>
            </tr>
            @endforeach
            <!-- More rows... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>