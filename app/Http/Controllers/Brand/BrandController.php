<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\BrandStoreRequest;
use App\Http\Requests\Brand\BrandUpdateRequest;
use App\Repositories\Brand;
use App\Traits\Response\ResponseTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class BrandController extends Controller
{
    use ResponseTrait;

    public function index(): View
    {
        return view('app.brands.index');
    }

    public function store(BrandStoreRequest $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'created_by' => auth()->user()->id,
            ];

            $result = Brand::store($data);

            if ($result) {
                return $this->success('Marca creada correctamente');
            }

            return $this->error('Error al crear la marca');
        } catch (Throwable $e) {
            return $this->error('Error al crear la marca');
        }
    }

    public function update(BrandUpdateRequest $request, int $id)
    {
        try {
            $data = [
                'name' => $request->name,
                'description' => $request->description
            ];

            $result = Brand::update($id, $data);

            if ($result) {
                return $this->success('Marca actualizada correctamente');
            }

            return $this->error('Error al actualizar la marca');
        } catch (Throwable $e) {
            return $this->error('Error al actualizar la marca');
        }
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->get('id');

            $result = Brand::delete($id);

            if ($result) {
                return $this->success('Marca borrada correctamente');
            }

            return $this->error('Error al borrar la marca');
        } catch (Throwable $e) {
            return $this->error('Error al borrar la marca');
        }
    }

    // partials

    public function brandTable(): View
    {
        $brands = Brand::search();

        return view('app.brands.partials.tables.brands-table', compact('brands'));
    }

    public function editBrandModal(Request $request): View
    {
        $id = $request->input('id');

        $brand = Brand::searchById($id);

        return view('app.brands.partials.modals.edit-brand-modal', compact('brand'));
    }
}
