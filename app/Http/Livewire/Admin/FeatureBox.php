<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\FeatureBox as _FeatureBox;
use App\Traits\WithSweetAlert;

class FeatureBox extends Component
{

    use WithSweetAlert;
    use WithFileUploads;

    public $featureBoxs = [];
    public $isEditModeOn = false;
    public $featureBoxId;
    public $oldImage;

    // Form variable
    public $supTitle;
    public $title;
    public $subTitle;
    public $buttonText;
    public $buttonLink;
    public $image;
    public $isPublished = true;


    protected $rules = [
        'supTitle' => ['required', 'string'],
        'title' => ['required', 'string'],
        'subTitle' => ['required', 'string'],
        'buttonText' => ['required', 'string'],
        'buttonLink' => ['required', 'string'],
        'isPublished' => ['nullable', 'boolean'],
        'image' => ['required'],
    ];


    protected $listeners = [
        'onFeatureBoxDelete' => 'deleteFeatureBoxHandeler',
    ];


    public function mount()
    {
        $this->preparedInitialData();
    }

    public function render()
    {
        return view('admin.components.feature-box');
    }


    public function createFeatureBox()
    {
        $this->validate();

        $featureBox = _FeatureBox::create([
            'sup_title' => $this->supTitle,
            'title' => $this->title,
            'sub_title' => $this->subTitle,
            'button_text' => $this->buttonText,
            'button_link' => $this->buttonLink,
            'is_published' => $this->isPublished,
        ]);

        if($featureBox){

            $featureBox->addMedia($this->image)->toMediaCollection('image');

            $this->reset();

            $this->preparedInitialData();
    
            return $this->success('Created', 'Feature box created successfully');
        }

        return $this->error('Failed', 'Failed to create feature box', 'Something went wrong try again');

    }


    public function updateFeatureBox()
    {
        $this->validate([
            'supTitle' => ['required', 'string'],
            'title' => ['required', 'string'],
            'subTitle' => ['required', 'string'],
            'buttonText' => ['required', 'string'],
            'buttonLink' => ['required', 'string'],
        ]);

        $featureBox = _FeatureBox::find($this->featureBoxId);

        $featureBox->sup_title = $this->supTitle;
        $featureBox->title = $this->title;
        $featureBox->sub_title = $this->subTitle;
        $featureBox->button_text = $this->buttonText;
        $featureBox->button_link = $this->buttonLink;
        $featureBox->is_published = $this->isPublished;

        if($this->image){
            $featureBox->addMedia($this->image)->toMediaCollection('image');
        }

        if($featureBox->save()){
            $this->reset();
            $this->preparedInitialData();
            return $this->success('Updated', 'Feature box updated successfully');
        }

        return $this->error('Failed', 'Failed to update. Try again');
    }


    public function removeImage()
    {
        $this->image->delete();
        $this->image = null;
    }


    public function confirmDeleteFeatureBox($id)
    {
        return $this->ifConfirmThenDispatch('onFeatureBoxDelete', $id, 'Are you sure ?', 'Feature box will delete permanently');
    }


    public function deleteFeatureBoxHandeler($id)
    {
        if(_FeatureBox::destroy($id)) {
            $this->reset();
            $this->preparedInitialData();
            return $this->success('Deleted', 'Feature box deleted successfully');
        }

        return $this->error('Failed', 'Something went wrong ! try again');

    }


    public function enableFeatureBoxEditMode($id)
    {
        $featureBox = _FeatureBox::find($id);

        $this->featureBoxId = $featureBox->id;
        $this->supTitle = $featureBox->sup_title;
        $this->title = $featureBox->title;
        $this->subTitle = $featureBox->sub_title;
        $this->buttonText = $featureBox->button_text;
        $this->buttonLink = $featureBox->button_link;
        $this->isPublished = $featureBox->is_published;
        $this->oldImage = $featureBox->getFirstMediaUrl('image');

        $this->isEditModeOn = true;

    }

    public function cancelFeatureBoxEditMode()
    {
        $this->reset();
        $this->preparedInitialData();
        $this->isEditModeOn = false;
    }


    private function preparedInitialData()
    {
        $this->featureBoxs = _FeatureBox::all();
    }
}
