<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vehicle\VehicleStoreRequest;
use App\Http\Requests\Vehicle\VehicleUpdateRequest;
use App\Repositories\Brand;
use App\Repositories\Client;
use App\Repositories\ModelVehicle;
use App\Repositories\Vehicle;
use App\Traits\Response\ResponseTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class VehicleController extends Controller
{
    use ResponseTrait;

    public function index(): View
    {
        $models = ModelVehicle::search();
        $brands = Brand::search();
        $clients = Client::search();

        return view('app.vehicles.index', compact('models', 'brands', 'clients'));
    }

    public function store(VehicleStoreRequest $request)
    {
        try {
            $data = [
                'plate_number' => $request->plate_number,
                'year' => $request->year,
                'models_id' => $request->model_id,
                'clients_id' => $request->client_id,
                'created_by' => auth()->user()->id,
            ];

            $result = Vehicle::store($data);

            if ($result) {
                return $this->success('Vehículo creado correctamente');
            }

            return $this->error('Error al crear el vehículo');
        } catch (Throwable $e) {
            return $this->error('Error al crear el vehículo' . $e->getMessage());
        }
    }

    public function update(VehicleUpdateRequest $request, int $id)
    {
        try {
            $data = [
                'plate_number' => $request->plate_number,
                'year' => $request->year,
                'models_id' => $request->model_id,
                'clients_id' => $request->client_id
            ];

            $result = Vehicle::update($id, $data);

            if ($result) {
                return $this->success('Vehículo actualizado correctamente');
            }

            return $this->error('Error al actualizar el vehículo');
        } catch (Throwable $e) {
            return $this->error('Error al actualizar el vehículo: ' . $e->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->get('id');

            $result = Vehicle::delete($id);

            if ($result) {
                return $this->success('Vehículo borrado correctamente');
            }

            return $this->error('Error al borrar el vehículo');
        } catch (Throwable $e) {
            return $this->error('Error al borrar el vehículo');
        }
    }

    // partials

    public function vehicleTable(): View
    {
        $vehicles = Vehicle::search();

        return view('app.vehicles.partials.tables.vehicles-table', compact('vehicles'));
    }

    public function editVehicleModal(Request $request): View
    {
        $id = $request->input('id');
        $vehicle = Vehicle::searchById($id);

        $data = [
            'vehicle' => $vehicle,
            'brands' => Brand::search(),
            'models' => ModelVehicle::searchByBrandId($vehicle->brands_id),
            'clients' => Client::search()
        ];

        return view('app.vehicles.partials.modals.edit-vehicle-modal', $data);
    }
}
