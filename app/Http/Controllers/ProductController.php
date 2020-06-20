<?php

namespace App\Http\Controllers;

// use App\Http\Requests;
use App\Http\Requests\StoreUpdateControllerRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use PDOException;

//controller gerado automaticamente com todos os metodos prontos;
class ProductController extends Controller
{

    protected $request;
    protected $Product;

    public function __construct(Request $request, Product $product)
    {
        $this->request = $request;
        $this->Product = $product;

        // $this->middleware(['auth']); //aplica o middleware em todas as rotas;
        // $this->middleware(['auth'])->only('index'); //aplica o middleware somente em index;
        // $this->middleware(['auth'])->except('index'); //aplica o middleware em todas as rotas exceto na index;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //rota da view de todas listagem
    {
        // $products = Product::all(); //retorna todos os produtos do banco
        // $products = Product::get(); //retorna todos os produtos do banco
        try {

            $products = $this->Product::paginate(10);

            if (!$products) {
                return "Nenhum produto encontrado";
            };
            return view('pages.product.index', ['products' => $products]);
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //rota da view de criação de produto
    {

        return view('pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateControllerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateControllerRequest $request) //rota da função de criação de produto
    {
        #forma 1 de fazer validação de formulario
        /*
        $this->request->validate([
            'name' => "required",
            'description' => "required"
        ]);
        */

        #forma 2 de fazer validção de formulario




        // dd($this->request->only(['name'])); //pega somente o parametro 'name' da requisição;
        ## ou ##
        // dd($this->request->name);//pega o parametro da requisição;
        // dd($this->request->all()); //pega todos os dados requisição;
        //outros tipos: execpt, input... 

        // if ($this->request->photo->isValid()) //verifica se a foto foi enviada sem erro
        // {
        // dd($this->request->photo);//emprimi o valor da foto

        // mudar em silesystems local para public, pra mudar o local privado para publico quando salvar arquivos;
        // $this->request->photo->store('product'); //salva no storage privado da aplicação com nome unico;

        // $name = $this->request->name.'.'.$this->request->photo->extension();
        // $this->request->photo->storeAs('product', $name); //salva no storage privado da aplicação com nome personalizado;

        ### metodos ##
        //extensions()-> pega a extensão da foto
        //getClienteOriginName() ->pega o nome original da foto;
        // };

        // $data = $request->all();
        $data = $request->only(['name', 'description', 'price']);
        $this->Product::create($data);

        //pra poder usar o metodo create, o model precisa de uma variavel chamada fillable
        //que recebe um array com todas as colunas que podem ser preenchidas
        //isso pra evitar ataque e/ou invasão;
        flash('Produto criado com sucesso!')->important(); //manda uma mensagem pra sessão, que é exibida onde o flash ta sendo incluido
        //tipos de mesagem
        /*
                ->error();
                ->success();
                ->danger();
                ->warning();
                ->important();
                ->overlay();
            */

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //rota da view de listar produto por id
    {
        // $product = Product::where('id', $id)->first(); //pega o produto pelo id no banco

        #outra forma#

        $product = $this->Product::find($id); //pega o produto pelo id no banco

        if (!$product) {
            return redirect()->back(); //se não acha o produto ele retorna pra pagina anterior
        }

        return view("pages.product.show", ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //rota da view de edit
    {
        $product = $this->Product::find($id); //pega o produto pelo id no banco

        if (!$product) {
            return redirect()->back(); //se não acha o produto ele retorna pra pagina anterior
        }
        return view('pages.product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     *@param  \App\Http\Requests\StoreUpdateControllerRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, StoreUpdateControllerRequest $request) //rota da função de edit
    {

        // dd($this->request->only(['name'])); //pega somente o parametro 'name' da requisição;
        ## ou ##
        // dd($this->request->name);//pega o parametro da requisição;
        // dd($this->request->all()); //pega todos os dados requisição;
        //outros tipos: execpt, input... 
        // $data = $request->only(['name', 'description', 'price', 'image']);
        $data = $request->all();
        $product = $this->Product::find($id); //pega o produto pelo id no banco

        if (!$product) {
            return redirect()->back(); //se não acha o produto ele retorna pra pagina anterior
        }

        $product->update($data);
        flash('Produto editado com sucesso!')->important(); 
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //rota da função de delete
    {
        $product = $this->Product::find($id);

        if (!$product) {
            return redirect()->back();
        }
        $product->delete();
        flash('Produto deletado com sucesso!')->important();

        return redirect()->route('product.index');
    }
}
