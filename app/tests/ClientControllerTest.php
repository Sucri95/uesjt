<?php

class ClientControllerTest extends TestCase {

    Public function testindex()
    {
        $this->call('GET', '/client');
        $this->assertViewHas('');
        $this->assertTrue($this->client->getResponse()->isOk());

    }

    Public function teststore()
    {
        $this->call('POST', '/client/crearCliente', array(

            'companyname' => 'Nilo C.A',
            'type' => 'Ventas',
            'ruc' => '2324232',
            'category' => '2',
            'address' => 'Panama',
            'phone' => '0294-8876245',
            'email' => 'hola@adios.com'
            )
        );
         $this->assertTrue($this->client->getResponse()->isOk());
    }

    Public function testupdate()
    {
        $this->call('PUT', '/client/editarCliente/1', array(

            'companyname' => 'Agua C.A',
            'type' => 'Mercancia',
            'ruc' => '2324232',
            'category' => '1',
            'address' => 'Panama',
            'phone' => '0294-8876245',
            'email' => 'hola@adios.com'
            )

        );
        $this->assertTrue($this->client->getResponse()->isOk());
    }

    Public function testdestroy()
    {
        $this->call('DELETE', '/client/borrarCliente/1');
        $this->assertTrue($this->client->getResponse()->isOk());


    }

}