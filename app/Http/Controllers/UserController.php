<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Facades\ChannelLog as Log;
use App\Http\Requests;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Auth;
use DB;

class UserController extends Controller
{

    public $Stages = ['Em construção','Em Reforma','Implementação','Treinamento','Aprendiz','Quiosque','Loja','Super Loja','Mega Loja','Hiper Loja','Ancora'];
    public $resellerChannel = ['','""','123','1534533485','Acompanhar Preço Concorrencia Cnova','Admin','amazon','Amazon.com.br','americanas','AMERICANAS_1228','AMERICANAS_12332212','AMERICANAS_12332213','AMERICANAS_1235','AMERICANAS_1446','Análise Concorrencia até 1000','andre2s','andreteste','annebonny_sv','Antes de Mim MKT','antesdemim','antes_de_mim','Atena.ai','Atena.ai car28ng4mifmbnng6dm18ncsej4p1','Atena.ai car2aff4382eumglvk4cn2rq5brej','Atena.ai car3v78ic0fdg6s6hkghopivr8429','Atena.ai car40qkas021dh4ocr1mebo8q50a4','Atena.ai car52hakq1vhbe0770deog974grem','Atena.ai car581fepb7tvblqtt2jqktdamcll','Atena.ai car5cdii0qqacrbkhcq3nkmg81tdo','Atena.ai car5gdfniph7cuu5eid160l3104ev','Atena.ai car5kk3t0vemf5g3ftnmo9ll7s558','Atena.ai car5qgc38notd9ir6ichhh4sk4csg','Atena.ai car6rti0ibau96p1livoeap4pde61','Atena.ai car7f9rhqfo60c33e72dkujc9sh46','Atena.ai car7l909av5u57k2pffrv1oi8mk0l','Atena.ai carlmp1gfrfgdk5gai9nkqhd85cm','B2W','Brincs','Brinks','buscape','Carrefour','cea','Centauro','clarabarcelo_sv','Cnova','coleccionablesln_sv','Credits available applied','DAFFITI','Dafiti','default','Default Store View','Everlast Brasil','eyelit_sv','Fotter','Fotter.com.ar Store View','garzongarcia_sv','heyas_sv','homecollection_sv','Kasa Decorada','KOMLOG','kpl','lazaro_sv','Led Lustre','Leitor de XML','LIVONSHOP','LOJASAMERICANAS','Luzeiro','madeiramadeira','MagazineLuiza','Magento','marketplace','Mercado Livre','MercadoLibre','MercadoLivre','MercadoShops','minha_aplicacao','minha_aplicacao2','minha_aplicacao231','minha_aplicacao_andre','minha_aplicacao_andre_1','minha_aplicacao_andre_10','minha_aplicacao_andre_11','minha_aplicacao_andre_12','minha_aplicacao_andre_13','minha_aplicacao_andre_14','minha_aplicacao_andre_15','minha_aplicacao_andre_16','minha_aplicacao_andre_17','minha_aplicacao_andre_3','minha_aplicacao_andre_4','minha_aplicacao_andre_5','minha_aplicacao_andre_6','minha_aplicacao_andre_7','minha_aplicacao_andre_9','minha_aplicacao_andre_teste229','Mobly','Mozzi','mshops','My Market','NETSHOES','NETSHOES ATG','ninaandpaul_sv','nytron','painel','painel095','painel13335','painel15','painel175','painel1752','pedidoDeTeste','peterkent_sv','plugg.com.br','pluggto','polihouse','Portugês','Português','Português (Brasil)','Português-Brasil','Principal','queenjuana_sv','Respostas Automáticas MercadoLivre','Ricardo Eletro','RimoMarketplace','rimo_mkt','rimo_mkt1','Saraiva','Setta MarketPlce','Shopify','SHOPTIME','sofimartire_sv','square_sv','SUBMARINO','teste','Teste-5b6dc4848b11a','Teste-5b6dc6fc88509','Teste-5b6dcd39ab0c9','Teste-5b71ccd1efd97','viauno_sv','Visão MacBike','Visão Padrão','VitalCare','VitalCare Marketplace','WalMart','ZATTINI','Zoom'];

    public function index()
	{
       // $getAllPricings = Pricing::orderBy('description', 'ASC')->get();
       // $getAllApplications = Applications::orderBy('name', 'ASC')->get();
       // $getAllDepartments = Department::orderBy('name', 'ASC')->get();
       $getAllApplications = array();
       $getAllDepartments =  array();
       $getAllPricings = array();
        return view('pages.users', 
            [
                'getAllPricings' => $getAllPricings, 
                'getAllApplications' => $getAllApplications,
                'getAllDepartments' => $getAllDepartments,
                'getAllStages' => $this->Stages
            ]
        );
    }
}