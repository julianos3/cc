<?php

namespace CentralCondo\Http\Controllers\Portal;

use CentralCondo\Repositories\Portal\CondominiumRepository;
use CentralCondo\Services\Portal\BlockService;
use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use CentralCondo\Http\Requests\Portal\BlockRequest;
use CentralCondo\Repositories\Portal\BlockRepository;
use CentralCondo\Validators\Portal\BlockValidator;
use CentralCondo\Http\Controllers\Controller;


class BlockController extends Controller
{
    /**
     * @var BlockRepository
     */
    protected $repository;

    /**
     * @var BlockValidator
     */
    protected $validator;

    /**
     * @var BlockService
     */
    private $service;

    /**
     * @var CondominiumRepository
     */
    private $condominiumRepository;

    /**
     * BlockController constructor.
     * @param BlockRepository $repository
     * @param BlockValidator $validator
     * @param BlockService $service
     * @param CondominiumRepository $condominiumRepository
     */
    public function __construct(BlockRepository $repository,
                                BlockValidator $validator,
                                BlockService $service,
                                CondominiumRepository $condominiumRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->service = $service;
        $this->condominiumRepository = $condominiumRepository;
    }

    public function index()
    {
        $dados = $this->repository->all();
        return view('portal.block.index', compact('dados'));
    }

    public function create()
    {
        $condominium = $this->condominiumRepository->listCondominium();
        return view('portal.block.create', compact('condominium'));
    }

    public function store(BlockRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function edit($id)
    {
        $dados = $this->repository->find($id);
        $condominium = $this->condominiumRepository->listCondominium();

        return view('portal.block.edit', compact('dados', 'condominium'));
    }

    public function update(BlockRequest $request, $id)
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
