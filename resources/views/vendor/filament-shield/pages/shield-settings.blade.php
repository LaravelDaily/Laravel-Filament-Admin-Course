<x-filament::page class="filament-resources-create-record-page">
    <x-filament::form wire:submit.prevent="save">
        {{ $this->form }}

        <x-filament::form.actions :actions="$this->getCachedFormActions()" />
    </x-filament::form>
</x-filament::page>
