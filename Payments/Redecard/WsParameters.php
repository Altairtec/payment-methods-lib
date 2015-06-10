<?php
namespace Payment\Redecard;

class WsParameters
{
    private $total;
    private $transacao;
    private $parcelas;
    private $filiacao;
    private $numpedido;
    private $cartao;
    private $cvc2;
    private $mes;
    private $ano;
    private $portador;
    private $iata;
    private $distribuidor;
    private $concentrador;
    private $taxaembarque;
    private $entrada;
    private $pax1;
    private $pax2;
    private $pax3;
    private $pax4;
    private $numdoc1;
    private $numdoc2;
    private $numdoc3;
    private $numdoc4;
    private $conftxn;
    private $adddata;

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTransacao($transacao)
    {
        $this->transacao = $transacao;
    }

    public function getTransacao()
    {
        return $this->transacao;
    }

    public function setParcelas($parcelas)
    {
        $this->parcelas = $parcelas;
    }

    public function getParcelas()
    {
        return $this->getParcelas();
    }

    public function setFiliacao($filiacao)
    {
        $this->filiacao = $filiacao;
    }

    public function getFiliacao()
    {
        return $this->filiacao;
    }

    public function setNumPedido($numpedido)
    {
        $this->numpedido = $numpedido;
    }

    public function getNumPedido()
    {
        return $this->numpedido;
    }

    public function setCartao($cartao)
    {
        $this->cartao = $cartao;
    }

    public function getCartao()
    {
        return $this->cartao;
    }

    public function setCvc2($cvc2)
    {
        $this->cvc2 = $cvc2;
    }

    public function getCvc2()
    {
        return $this->getCvc2();
    }

    public function setMes($mes)
    {
        $this->mes = $mes;
    }

    public function getMes()
    {
        return $this->mes;
    }

    public function setAno($ano)
    {
        $this->ano = $ano;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function setPortador($portador)
    {
        $this->portador = $portador;
    }

    public function getPortador()
    {
        return $this->portador;
    }

    public function setIata($iata)
    {
        $this->iata = $iata;
    }

    public function getIata()
    {
        return $this->iata;
    }

    public function setDistribuidor($distribuidor)
    {
        $this->distribuidor = $distribuidor;
    }

    public function getDistribuidor()
    {
        return $this->distribuidor;
    }

    public function setConcentrador($concentrador)
    {
        $this->concentrador = $concentrador;
    }

    public function getConcentrador()
    {
        return $this->concentrador;
    }

    public function setTaxaEmbarque($taxaembarque)
    {
        $this->taxaembarque = $taxaembarque;
    }

    public function getTaxaEmbarque()
    {
        return $this->taxaembarque;
    }

    public function setEntrada($entrada)
    {
        $this->entrada = $entrada;
    }

    public function getEntrada()
    {
        return $this->entrada;
    }

    public function setPax1($pax1)
    {
        $this->pax1 = $pax1;
    }

    public function getPax1()
    {
        return $this->pax1;
    }

    public function setPax2($pax2)
    {
        $this->pax2 = $pax2;
    }

    public function getPax2()
    {
        return $this->pax2;
    }

    public function setPax3($pax3)
    {
        $this->pax3 = $pax3;
    }

    public function getPax3()
    {
        return $this->pax3;
    }

    public function setPax4($pax4)
    {
        $this->pax4 = $pax4;
    }

    public function getPax4()
    {
        return $this->pax4;
    }

    public function setNumDoc1($numdoc1)
    {
        $this->numdoc1 = $numdoc1;
    }

    public function getNumDoc1()
    {
        return $this->numdoc1;
    }

    public function setNumDoc2($numdoc2)
    {
        $this->numdoc2 = $numdoc2;
    }

    public function getNumDoc2()
    {
        return $this->numdoc2;
    }

    public function setNumDoc3($numdoc3)
    {
        $this->numdoc3 = $numdoc3;
    }

    public function getNumDoc3()
    {
        return $this->numdoc3;
    }

    public function setNumDoc4($numdoc4)
    {
        $this->numdoc4 = $numdoc4;
    }

    public function getNumDoc4()
    {
        return $this->numdoc4;
    }

    public function setConfTxn($conftxn)
    {
        $this->conftxn = $conftxn;
    }

    public function getConfTxn()
    {
        return $this->conftxn;
    }

    public function setAddData($adddata)
    {
        $this->adddata = $adddata;
    }

    public function getAddData()
    {
        return $this->adddata;
    }
}