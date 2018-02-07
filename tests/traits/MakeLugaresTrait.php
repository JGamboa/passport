<?php

use Faker\Factory as Faker;
use App\Models\Lugares;
use App\Repositories\LugaresRepository;

trait MakeLugaresTrait
{
    /**
     * Create fake instance of Lugares and save it in database
     *
     * @param array $lugaresFields
     * @return Lugares
     */
    public function makeLugares($lugaresFields = [])
    {
        /** @var LugaresRepository $lugaresRepo */
        $lugaresRepo = App::make(LugaresRepository::class);
        $theme = $this->fakeLugaresData($lugaresFields);
        return $lugaresRepo->create($theme);
    }

    /**
     * Get fake instance of Lugares
     *
     * @param array $lugaresFields
     * @return Lugares
     */
    public function fakeLugares($lugaresFields = [])
    {
        return new Lugares($this->fakeLugaresData($lugaresFields));
    }

    /**
     * Get fake data of Lugares
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLugaresData($lugaresFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'titulo' => $fake->word,
            'latitud' => $fake->word,
            'longitud' => $fake->word,
            'photo' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $lugaresFields);
    }
}
