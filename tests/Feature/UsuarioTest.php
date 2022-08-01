<?php
namespace Tests\Feature;

use App\Http\Controllers\usuarioController;
use PHPUnit\Framework\TestCase;

class usuarioControllerTest extends TestCase
{

    /**
     * @test
     */
    public function cadastrar_usuarios()
    {

        $usuarioController = new usuarioController;
        //$response = usuarioController::index();
        dd($usuarioController->cadastrar());
        //$response->assertStatus(200);
    }
}
