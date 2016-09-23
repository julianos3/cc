<?php

namespace CentralCondo\Http\Controllers\Portal;

use CentralCondo\Repositories\Portal\BlockRepository;
use CentralCondo\Repositories\Portal\CondominiumRepository;
use CentralCondo\Repositories\Portal\UnitTypeRepository;
use CentralCondo\Services\Portal\UnitService;
use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use CentralCondo\Http\Requests\Portal\UnitRequest;
use CentralCondo\Repositories\Portal\UnitRepository;
use CentralCondo\Validators\Portal\UnitValidator;
use CentralCondo\Http\Controllers\Controller;


class UnitController extends Controller
{
    /**
     * @var UnitRepository
     */
    protected $repository;

    /**
     * @var UnitValidator
     */
    protected $validator;

    /**
     * @var UnitService
     */
    private $service;

    /**
     * @var BlockRepository
     */
    private $blockRepository;

    /**
     * @var UnitTypeRepository
     */
    private $unitTypeRepository;

    /**
     * UnitController constructor.
     * @param UnitRepository $repository
     * @param UnitValidator $validator
     * @param UnitService $service
     * @param BlockRepository $blockRepository
     * @param UnitTypeRepository $unitTypeRepository
     */
    public function __construct(UnitRepository $repository,
                                UnitValidator $validator,
                                UnitService $service,
                                BlockRepository $blockRepository,
                                UnitTypeRepository $unitTypeRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->service = $service;
        $this->blockRepository = $blockRepository;
        $this->unitTypeRepository = $unitTypeRepository;
    }

    public function index()
    {
        $dados = $this->repository->all();
        return view('portal.unit.index', compact('dados'));
    }

    public function create()
    {
        $block = $this->blockRepository->listBlock();
        $type = $this->unitTypeRepository->listUnitType();
        return view('portal.unit.create', compact('block', 'type'));
    }

    public function store(UnitRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function edit($id)
    {
        $dados = $this->repository->find($id);
        $block = $this->blockRepository->listBlock();
        $type = $this->unitTypeRepository->listUnitType();

        return view('portal.unit.edit', compact('dados', 'block', 'type'));
    }

    public function update(UnitRequest $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'UsersRole deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'UsersRole deleted.');
    }
}
