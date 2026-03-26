<?php

namespace App\Livewire\Pages\Admin\Animal;

use App\Models\Animal;
use App\Models\Category;
use App\Models\Habitat;
use App\Models\Need;
use App\Models\Species;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAnimal extends Component
{
    use WithFileUploads;
    public $name;
    public $species_id;
    public $month_age;
    public $year_age;
    public $gender;
    public $weight;
    public $height;
    public $habitat_id;
    public $category_id;
    public $need = [];
    public $selectedNeeds = [];
    public $description;
    public $image;

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

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'species_id' => 'required|exists:species,id',
            'year_age' => 'required|integer|min:0|max:100',
            'month_age' => 'required|integer|min:0|max:11',
            'gender' => 'required|string|in:male,female',
            'weight' => 'required|numeric|min:0|max:999999',
            'height' => 'required|numeric|min:0|max:1000',
            'habitat_id' => 'required|exists:habitats,id',
            'category_id' => 'required|exists:categories,id',
            'selectedNeeds' => 'required|array|min:1',
            'description' => 'required|string|min:3|max:5000',
            'image' => 'required|image|max:2048',
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

            'year_age.required' => 'The age is required.',
            'year_age.integer' => 'The age must be an integer.',
            'year_age.min' => 'The age must be at least 0.',
            'year_age.max' => 'The age must be at most 100.',

            'month_age.required' => 'The age is required.',
            'month_age.integer' => 'The age must be an integer.',
            'month_age.min' => 'The age must be at least 0.',
            'month_age.max' => 'The age must be at most 11.',

            'gender.required' => 'The gender is required.',
            'gender.in' => 'The gender must be male or female.',


            'weight.required' => 'The weight is required.',
            'weight.numeric' => 'The weight must be a number.',
            'weight.min' => 'The weight must be at least 0.',
            'weight.max' => 'The weight must be at most 999999.',

            'height.required' => 'The height is required.',
            'height.numeric' => 'The height must be a number.',
            'height.min' => 'The height must be at least 0.',
            'height.max' => 'The height must be at most 1000.',

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

            'image.required' => 'You need to put an image of the animal.',
            'image.image' => 'The uploaded file must be an image.',
            'image.max' => 'The image size must be less than 2MB.',
        ];
    }

    public function save()
    {
        $this->validate();

        $name = Str::of($this->name)->trim()->title();

        $gender = $this->gender;

        $species_id = $this->species_id;

        $month_age = (int) $this->month_age;
        $year_age = (int) $this->year_age;
        $weight = (float) $this->weight;
        $height = (float) $this->height;

        $habitat_id = $this->habitat_id;
        $category_id = $this->category_id;

        $imagePath = $this->image->store('animals', 'public');

        $animal = Animal::create([
            'name' => $name,
            'species_id' => $species_id,
            'year_age' => $year_age,
            'month_age' => $month_age,
            'gender' => $gender,
            'weight' => $weight,
            'height' => $height,
            'habitat_id' => $habitat_id,
            'category_id' => $category_id,
            'description' => $this->description,
            'image' => $imagePath
        ]);

        $animal->needs()->attach($this->selectedNeeds);

        return redirect()->route('admin.animal.view')->with('success', 'Animal created successfully.');
    }
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.animal.create-animal');
    }
}
