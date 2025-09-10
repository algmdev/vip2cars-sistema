<?php

namespace App\Http\Controllers\ModelVehicle;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModelVehicle\ModelVehicleStoreRequest;
use App\Http\Requests\ModelVehicle\ModelVehicleUpdateRequest;
use App\Repositories\Brand;
use App\Repositories\ModelVehicle;
use App\Traits\Response\ResponseTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Throwable;

class ModelVehicleController extends Controller
{
    use ResponseTrait;

    public function index(): View
    {
        $brands = Brand::search();

        return view('app.models.index', compact('brands'));
    }

    public function store(ModelVehicleStoreRequest $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'brands_id' => $request->brands_id,
                'created_by' => auth()->user()->id,
            ];

            $result = ModelVehicle::store($data);

            if ($result) {
                return $this->success('Modelo creada correctamente');
            }

            return $this->error('Error al crear el modelo');
        } catch (Throwable $e) {
            return $this->error('Error al crear el modelo');
        }
    }

    public function update(ModelVehicleUpdateRequest $request, int $id)
    {
        try {
            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'brands_id' => $request->brands_id,
            ];

            $result = ModelVehicle::update($id, $data);

            if ($result) {
                return $this->success('Modelo actualizada correctamente');
            }

            return $this->error('Error al actualizar el modelo');
        } catch (Throwable $e) {
            return $this->error('Error al actualizar el modelo');
        }
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->get('id');

            $result = ModelVehicle::delete($id);

            if ($result) {
                return $this->success('Modelo borrada correctamente');
            }

            return $this->error('Error al borrar el modelo');
        } catch (Throwable $e) {
            return $this->error('Error al borrar el modelo');
        }
    }

    // partials

    public function modelTable(): View
    {
        $models = ModelVehicle::search();

        return view('app.models.partials.tables.models-table', compact('models'));
    }

    public function editModelModal(Request $request): View
    {
        $id = $request->input('id');
        $model = ModelVehicle::searchById($id);

        $brands = Brand::search();

        return view('app.models.partials.modals.edit-model-modal', compact('brands', 'model'));
    }
}
