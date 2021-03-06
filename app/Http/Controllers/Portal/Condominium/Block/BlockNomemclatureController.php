<?php

namespace CentralCondo\Http\Controllers\Portal;

use CentralCondo\Services\Portal\BlockNomemclatureService;
use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use CentralCondo\Http\Requests\Portal\BlockNomemclatureRequest;
use CentralCondo\Repositories\Portal\BlockNomemclatureRepository;
use CentralCondo\Validators\Portal\BlockNomemclatureValidator;
use CentralCondo\Http\Controllers\Controller;


class BlockNomemclatureController extends Controller
{
    /**
     * @var BlockNomemclatureRepository
     */
    protected $repository;

    /**
     * @var BlockNomemclatureValidator
     */
    protected $validator;

    /**
     * @var BlockNomemclatureService
     */
    private $service;

    /**
     * BlockNomemclatureController constructor.
     * @param BlockNomemclatureRepository $repository
     * @param BlockNomemclatureValidator $validator
     * @param BlockNomemclatureService $service
     */
    public function __construct(BlockNomemclatureRepository $repository, BlockNomemclatureValidator $validator, BlockNomemclatureService $service)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->service = $service;
    }

    public function index()
    {
        $data = $this->repository->all();
        return view('portal.block.nomemclature.index', compact('data'));
    }

    public function create()
    {
        return view('portal.block.nomemclature.create');
    }

    public function store(BlockNomemclatureRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function edit($id)
    {
        $data = $this->repository->find($id);

        return view('portal.block.nomemclature.edit', compact('data'));
    }

    public function update(BlockNomemclatureRequest $request, $id)
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
