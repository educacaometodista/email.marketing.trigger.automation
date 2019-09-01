<?php

namespace App\Http\Controllers\Auth;

use App\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm()
    {
        //return view('admin.auth.register');
        return redirect('/user/register');

    }

    protected function guard()
    {
        return Auth::guard('user');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
            'nomeMae' => ['required', 'string', 'max:255'],
            'dataNascimento' => ['required', 'string', 'max:255'],
            'sexo' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:255'],
            'rg' => ['required', 'string', 'max:255'],
            'orgaoExpedidorIdentidade' => ['required', 'string', 'max:255'],
            'unidadeFederativaIdentidade' => ['required', 'string', 'max:255'],
            'dataEmissaoIdentidade' => ['required', 'string', 'max:255'],
            'idEstadoCivil' => ['required', 'string', 'max:255'],
            'idProfissao' => ['required', 'string', 'max:255'],
            'idNaturezaOcupacao' => ['required', 'string', 'max:255'],
            'idNacionalidade' => ['required', 'string', 'max:255'],
            'idOrigemComercial' => ['required', 'string', 'max:255'],
            'idProduto' => ['required', 'string', 'max:255'],
            'numeroAgencia' => ['required', 'string', 'max:255'],
            'numeroContaCorrente' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'diaVencimento' => ['required', 'integer', 'max:255'],
            'nomeImpresso' => ['required', 'string', 'max:255'],
            'nomeEmpresa' => ['required', 'string', 'max:255'],
            'valorRenda' => ['required', 'integer', 'max:255'],
            'canalEntrada' => ['required', 'string', 'max:255'],
            'valorPontuacao' => ['required', 'integer', 'max:255'],
            'idTipoEndereco' => ['required', 'string', 'max:255'],
            'cep' => ['required', 'string', 'max:255'],
            'logradouro' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'integer', 'max:255'],
            'complemento' => ['required', 'string', 'max:255'],
            'pontoReferencia' => ['required', 'string', 'max:255'],
            'bairro' => ['required', 'string', 'max:255'],
            'cidade' => ['required', 'string', 'max:255'],
            'uf' => ['required', 'string', 'max:255'],
            'pais' => ['required', 'string', 'max:255'],
            'enderecoCorrespondencia' => ['required', 'boolean', 'max:255'],
            'limiteGlobal' => ['required', 'integer', 'max:255'],
            'limiteMaximo' => ['required', 'integer', 'max:255'],
            'limiteParcelas' => ['required', 'integer', 'max:255'],
            'limiteConsignado' => ['required', 'integer', 'max:255'],
            'nomeReferencia1' => ['required', 'string', 'max:255'],
            'enderecoReferencia1' => ['required', 'string', 'max:255'],
            'nomeReferencia2' => ['required', 'string', 'max:255'],
            'enderecoReferencia2' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Cliente::create([
            'nome' => $data['nome'],
            'nomeMae' => $data['nomeMae'],
            'dataNascimento' => $data['dataNascimento'],
            'sexo' => $data['sexo'],
            'cpf' => $data['cpf'],
            'rg' => $data['rg'],
            'orgaoExpedidorIdentidade' => $data['orgaoExpedidorIdentidade'],
            'unidadeFederativaIdentidade' => $data['unidadeFederativaIdentidade'],
            'dataEmissaoIdentidade' => $data['dataEmissaoIdentidade'],
            'idEstadoCivil' => $data['idEstadoCivil'],
            'idProfissao' => $data['idProfissao'],
            'idNaturezaOcupacao' => $data['idNaturezaOcupacao'],
            'idNacionalidade' => $data['idNacionalidade'],
            'idOrigemComercial' => $data['idOrigemComercial'],
            'idProduto' => $data['idProduto'],
            'numeroAgencia' => $data['numeroAgencia'],
            'numeroContaCorrente' => $data['numeroContaCorrente'],
            'email' => $data['email'],
            'diaVencimento' => $data['diaVencimento'],
            'nomeImpresso' => $data['nomeImpresso'],
            'nomeEmpresa' => $data['nomeEmpresa'],
            'valorRenda' => $data['valorRenda'],
            'canalEntrada' => $data['canalEntrada'],
            'valorPontuacao' => $data['valorPontuacao'],
            'idTipoEndereco' => $data['idTipoEndereco'],
            'cep' => $data['cep'],
            'logradouro' => $data['logradouro'],
            'numero' => $data['numero'],
            'complemento' => $data['complemento'],
            'pontoReferencia' => $data['pontoReferencia'],
            'bairro' => $data['bairro'],
            'cidade' => $data['cidade'],
            'uf' => $data['uf'],
            'pais' => $data['pais'],
            'enderecoCorrespondencia' => $data['enderecoCorrespondencia'],
            'limiteGlobal' => $data['limiteGlobal'],
            'limiteMaximo' => $data['limiteMaximo'],
            'limiteParcelas' => $data['limiteParcelas'],
            'limiteConsignado' => $data['limiteConsignado'],
            'nomeReferencia1' => $data['nomeReferencia1'],
            'enderecoReferencia1' => $data['enderecoReferencia1'],
            'nomeReferencia2' => $data['nomeReferencia2'],
            'enderecoReferencia2' => $data['enderecoReferencia2'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
