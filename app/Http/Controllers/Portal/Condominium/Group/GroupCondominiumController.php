<?php

namespace CentralCondo\Http\Controllers\Portal;

use CentralCondo\Repositories\Portal\CondominiumRepository;
use CentralCondo\Repositories\Portal\UsersGroupCondominiumRepository;
use CentralCondo\Services\Portal\GroupCondominiumService;
use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use CentralCondo\Http\Requests\Portal\GroupCondominiumRequest;
use CentralCondo\Repositories\Portal\GroupCondominiumRepository;
use CentralCondo\Validators\Portal\GroupCondominiumValidator;
use CentralCondo\Http\Controllers\Controller;


class GroupCondominiumController extends Controller
{
    /**
     * @var GroupCondominiumRepository
     */
    protected $repository;

    /**
     * @var GroupCondominiumValidator
     */
    protected $validator;

    /**
     * @var GroupCondominiumService
     */
    private $service;

    /**
     * @var CondominiumRepository
     */
    private $condominiumRepository;

    /**
     * @var UsersGroupCondominiumRepository
     */
    private $usersGroupCondominiumRepository;

    /**
     * GroupCondominiumController constructor.
     * @param GroupCondominiumRepository $repository
     * @param GroupCondominiumValidator $validator
     * @param GroupCondominiumService $service
     * @param CondominiumRepository $condominiumRepository
     * @param UsersGroupCondominiumRepository $usersGroupCondominiumRepository
     */
    public function __construct(GroupCondominiumRepository $repository,
                                GroupCondominiumValidator $validator,
                                GroupCondominiumService $service,
                                CondominiumRepository $condominiumRepository,
                                UsersGroupCondominiumRepository $usersGroupCondominiumRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->service = $service;
        $this->condominiumRepository = $condominiumRepository;
        $this->usersGroupCondominiumRepository = $usersGroupCondominiumRepository;
    }

    public function index()
    {
        $dados = $this->repository->all();
        return view('portal.condominium.group.index', compact('dados'));
    }

    public function create()
    {
        $condominium = $this->condominiumRepository->listCondominium();
        return view('portal.condominium.group.create', compact('condominium'));
    }

    public function store(GroupCondominiumRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function edit($id)
    {
        $dados = $this->repository->find($id);
        $condominium = $this->condominiumRepository->listCondominium();

        return view('portal.condominium.group.edit', compact('dados', 'condominium'));
    }

    public function update(GroupCondominiumRequest $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id)
    {
        //verifica se existem usuario cadastrados neste grupo
        $verifica = $this->usersGroupCondominiumRepository->findWhere([
            'group_id' => $id
        ]);

        if(count($verifica) > 0){
            return redirect()->back()->withErrors("Existem usuários vinculados a teste grupo")->withInput();
        }else{
            $deleted = $this->repository->delete($id);
            if (request()->wantsJson()) {

                return response()->json([
                    'message' => 'Group deleted.',
                    'deleted' => $deleted,
                ]);
            }

            return redirect()->back()->with('message', 'UsersRole deleted.');
        }


    }
}
