<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientStoreRequest;
use App\Http\Requests\Client\ClientUpdateRequest;
use App\Repositories\Client;
use App\Traits\Response\ResponseTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Throwable;

class ClientController extends Controller
{
    use ResponseTrait;

    public function index(): View
    {
        return view('app.clients.index');
    }

    public function store(ClientStoreRequest $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'paternal_surname' => $request->paternal_surname,
                'maternal_surname' => $request->maternal_surname,
                'document_number' => $request->document_number,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'created_by' => auth()->user()->id,
            ];

            $result = Client::store($data);

            if ($result) {
                return $this->success('Cliente creado correctamente');
            }

            return $this->error('Error al crear el cliente');
        } catch (Throwable $e) {
            return $this->error('Error al crear el cliente');
        }
    }

    public function update(ClientUpdateRequest $request, int $id)
    {
        try {
            $data = [
                'name' => $request->name,
                'paternal_surname' => $request->paternal_surname,
                'maternal_surname' => $request->maternal_surname,
                'document_number' => $request->document_number,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
            ];

            $result = Client::update($id, $data);

            if ($result) {
                return $this->success('Cliente actualizado correctamente');
            }

            return $this->error('Error al actualizar el cliente');
        } catch (Throwable $e) {
            return $this->error('Error al actualizar el cliente');
        }
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->get('id');

            $result = Client::delete($id);

            if ($result) {
                return $this->success('Cliente borrado correctamente');
            }

            return $this->error('Error al borrar la cliente');
        } catch (Throwable $e) {
            return $this->error('Error al borrar la cliente');
        }
    }

    // partials

    public function clientTable(): View
    {
        $clients = Client::search();

        return view('app.clients.partials.tables.clients-table', compact('clients'));
    }

    public function editclientModal(Request $request): View
    {
        $id = $request->input('id');

        $client = Client::searchById($id);

        return view('app.clients.partials.modals.edit-client-modal', compact('client'));
    }
}
