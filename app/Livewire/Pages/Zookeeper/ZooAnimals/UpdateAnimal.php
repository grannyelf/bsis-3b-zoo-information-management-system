<?php

namespace App\Livewire\Pages\Zookeeper\ZooAnimals;

use App\Models\Animal;
use App\Models\Category;
use App\Models\Habitat;
use App\Models\Need;
use App\Models\Species;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class UpdateAnimal extends Component
{
    use WithFileUploads;
    public $name;
    public $species_id;
    public $age;
    public $weight;
    public $height;
    public $habitat_id;
    public $category_id;
    public $need = [];
    public $selectedNeeds = [];
    public $description;
    public $image;
    public $existingImage;
    public $animalId;

    #[Computed()]
    public function species()
    {
        return Species::query()
            ->select('id', 'species_name', 'species_desc')
            ->orderBy('species_name', 'asc')
            ->get();
    }

    #[Computed()]
    public function habitats()
    {
        return Habitat::query()
            ->select('id', 'hab_name', 'hab_desc', 'hab_temp')
            ->orderBy('hab_name', 'asc')
            ->get();
    }

    #[Computed()]
    public function categories()
    {
        return Category::query()
            ->select('id', 'cat_name', 'cat_desc')
            ->orderBy('cat_name', 'asc')
            ->get();
    }

    #[Computed()]
    public function needs()
    {
        return Need::query()
            ->select('id', 'food_name', 'animal_needs')
            ->orderBy('food_name', 'asc')
            ->get();
    }

    public function mount($id)
    {
        $this->animalId = $id;
        $this->loadAnimalData();
    }

    public function loadAnimalData()
    {
        $animal = Animal::findOrFail($this->animalId);
        $this->name = $animal->name;
        $this->species_id = $animal->species_id;
        $this->age = $animal->age;
        $this->weight = $animal->weight;
        $this->height = $animal->height;
        $this->habitat_id = $animal->habitat_id;
        $this->category_id = $animal->category_id;
        $this->description = $animal->description;
        $this->selectedNeeds = $animal->needs()->pluck('id')->toArray();
        $this->existingImage = $animal->image;
        $this->image = null;
    }
    public function rules()
    {
        return [
            'age' => 'required|integer|min:0',
            'weight' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'habitat_id' => 'required|exists:habitats,id',
            'description' => 'required|string|min:3|max:5000',
            'selectedNeeds' => 'required|array|min:1',
            'image' => 'nullable|image|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The animal name is required.',
            'name.min' => 'The animal name must be at least 3 characters.',
            'name.max' => 'The animal name is too long.',

            'species_id.required' => 'The species is required.',
            'species_id.exists' => 'The selected species is invalid.',

            'age.required' => 'The age is required.',
            'age.integer' => 'The age must be an integer.',
            'age.min' => 'The age must be at least 0.',

            'weight.required' => 'The weight is required.',
            'weight.numeric' => 'The weight must be a number.',
            'weight.min' => 'The weight must be at least 0.',

            'height.required' => 'The height is required.',
            'height.numeric' => 'The height must be a number.',
            'height.min' => 'The height must be at least 0.',

            'habitat_id.required' => 'The habitat is required.',
            'habitat_id.exists' => 'The selected habitat is invalid.',

            'category_id.required' => 'The category is required.',
            'category_id.exists' => 'The selected category is invalid.',

            'selectedNeeds.required' => 'At least one need must be selected.',
            'selectedNeeds.array' => 'SELECT VALID NEEDS',
            'selectedNeeds.min' => 'SELECT AT LEAST ONE NEEDS',

            'description.required' => 'The description is required.',
            'description.min' => 'The description must be at least 3 characters.',
            'description.max' => 'The description is too long.',

            'image.image' => 'The uploaded file must be an image.',
            'image.max' => 'The image size must be less than 2MB.',
        ];
    }

    public function update()
    {
        $this->validate();
        $animal = Animal::findOrFail($this->animalId);

        $age = $this->age;
        $weight = $this->weight;
        $height = $this->height;

        $habitat_id = $this->habitat_id;

        $description = Str::of($this->description)->trim();

        $imagePath = $this->existingImage;
        if ($this->image instanceof TemporaryUploadedFile) {
            $imagePath = $this->image->store('animals', 'public');
        }

        $animal->update([
            'age' => $age,
            'weight' => $weight,
            'height' => $height,
            'habitat_id' => $habitat_id,
            'description' => $description,
            'image' => $imagePath,
        ]);

        $animal->needs()->sync($this->selectedNeeds);

        redirect()->route('zookeeper.dashboard')->with('success', 'Animal updated successfully!');
        // this will update the animal in the database with the new data
    }

    #[Layout('components.layouts.zookeeper')]
    public function render()
    {
        return view('livewire.pages.zookeeper.zoo-animals.update-animal');
    }
}
