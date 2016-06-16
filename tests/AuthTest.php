<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Segundo\Models\Usuario;

class AuthTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A home exibe um formulário de login?
     *
     * @return void
     */
    public function testSeHomeExibeUmFormularioDeLogin()
    {

        $this->visit('/')
            ->see('telefone')
            ->see('senha')
            ->see('entrar');

        $this->assertResponseStatus(200);

    }

    /**
     * Se eu preencher um email em branco no login vou ser devolvido pra home?
     *
     * @return void
     */
    public function testSeEuPreencherUmTelefoneEmBrancoNoLoginVouSerDevolvidoParaHome()
    {
        factory(Usuario::class)->create(['password' => bcrypt('secret')]);

        $this->visit('/')
            ->type('', 'telefoneUsuario')
            ->type('secret', 'password')
            ->press('entrar')
            ->seePageIs('/');

        $this->assertResponseStatus(200);

    }

    /**
     * Se eu preencher uma senha em branco no login vou ser devolvido para home?
     *
     * @return void
     */
    public function testSeEuPreencherUmaSenhaEmBrancoNoLoginVouSerDevolvidoParaHome()
    {
        $usuario = factory(Usuario::class)->create(['password' => bcrypt('secret')]);

        $this->visit('/')
            ->type($usuario->telefoneUsuario, 'telefoneUsuario')
            ->type('', 'password')
            ->press('entrar')
            ->seePageIs('/');

        $this->assertResponseStatus(200);

    }

    /**
     * Se eu preencher um usuário e senha inválidos vou ser devolvido para a home com erro na session?
     *
     * @return void
     */
    public function testSeEuPreencherTelefoneESenhaInvalidosNoLoginVouSerDevolvidoParaHome()
    {
        $this->visit('/')
            ->type('', 'telefoneUsuario')
            ->type('', 'password')
            ->press('entrar')
            ->seePageIs('/');

        $this->assertResponseStatus(200);

    }

    /**
     * Se eu preencher um usuário e senha válidos vou ser redirecionado para /dashboard e ver o "Bem vindo FULANO DE TAL" nessa tela?
     *
     * @return void
     */
    public function testSeEuPreencherTelefoneESenhaValidosNoLoginVouSerRedirecionadoParaDashBoardEVerOBemVindoFulanoDeTalNessaTela()
    {
        $usuario = factory(Usuario::class)->create(['password' => bcrypt('secret')]);

        $this->visit('/')
            ->type($usuario->telefoneUsuario, 'telefoneUsuario')
            ->type('secret', 'password')
            ->press('entrar')
            ->seePageIs('/dashboard');

        $this->assertResponseStatus(200);

    }
}
