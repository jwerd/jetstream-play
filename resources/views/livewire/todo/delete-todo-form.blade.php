<!-- Delete User Confirmation Modal -->
<x-jet-dialog-modal wire:model="confirmTodoDeletion">
    <x-slot name="title">
        {{ __('Delete Todo') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to delete this todo?  This cannot be undone.') }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('confirmTodoDeletion')" wire:loading.attr="disabled">
            {{ __('Nevermind') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="deleteTodo" wire:loading.attr="disabled">
            {{ __('Delete Todo') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>