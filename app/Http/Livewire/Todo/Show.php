<?php

namespace App\Http\Livewire\Todo;

use App\Models\TodoItem;
use Livewire\Component;

class Show extends Component
{
    public $confirmingTodoDeletion = false;
    protected $listeners = ['saved'];

    public function render()
    {
        $list = TodoItem::orderBy('done','asc')
            ->orderBy('created_at','desc')
            ->get();

        return view('livewire.todo.show', [ 'list' => $list ]);
    }

    public function saved()
    {
        $this->render();
    }

    public function markAsDone(TodoItem $item)
    {
        $item->done = true;
        $item->save();
    }

    public function markAsToDo(TodoItem $item)
    {
        $item->done = false;
        $item->save();
    }

    public function deleteItem(TodoItem $item)
    {
        $item->delete();
        $this->confirmingTodoDeletion = false;
    }

    public function confirmingTodoDeletion()
    {
        return !$this->confirmingTodoDeletion;
    }

    public function confirmTodoDeletion(TodoItem $item)
    {
        $this->confirmingTodoDeletion = true;
    }
}