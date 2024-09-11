<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmpleadosModel;
use App\Models\ProductosModel;

class Empleados extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {


        return view('empleados/index'); //Vista Empleados plantilla
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        $productosModel = new ProductosModel();
        $data['productos'] = $productosModel->findAll();

        return view('empleados/nuevos', $data);


    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $reglas = [
            'clave' => 'required|min_lenght[5]|max_lenght[10]|is_unique[empleados.clave]',
            'nombre' => 'required',
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'email' => 'valid_email',
            'departamento' => 'required|is_not_unique [productos.id]'
        ];


       if(!$this->validate($reglas)){
           return redirect()->back()->withInput()->with('ERROR', $this->validator->listErrors());
       }

        $post = $this->request->getPost(['clave','nombre','fecha_nacimiento','telefono','email','departamento']);

        $empleadosModel = new EmpleadosModel();
        $empleadosModel->insert([
            'clave' => trim($post['clave']),
            'nombre'=> trim($post['nombre']),
            'fecha_nacimiento'=> $post['fecha_nacimiento'],
            'email'=> $post['email'],
            'id_departamento'=> $post['departamento'],
        ]);

        return redirect()->to('empleados');


      // $post = $this->request->getPost(['clave', 'nombre', 'fecha_nacimiento', 'telefono', 'email', 'departamento']);
      // $empleadosModel = new EmpleadosModel();
      // $empleadosModel->insert([

      //     'clave' => trim($post['clave']),
      //     'nombre' => trim($post['nombre']),
      //     'fecha_nacimiento' => trim($post['fecha_nacimiento']),
      //     'telefono' => trim($post['telefono']),
      //     'email' => trim($post['email']),
      //     'id_departamentos' => trim($post['departamento'])
      // ]);

     //   return redirect()->to(uri: 'empleados');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
