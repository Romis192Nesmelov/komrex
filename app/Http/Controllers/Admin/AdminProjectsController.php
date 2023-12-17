<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\HelperTrait;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\ProjectType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProjectsController extends AdminBaseController
{
    use HelperTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function projectTypes($slug=null): View
    {
        $this->getProjectsMenu();
        return $this->getSomething('project_types', new ProjectType(), $slug);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editProjectType(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new ProjectType(),
            ['name' => 'required|min:3|max:50']
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.project_types'));
    }

    public function deleteProjectType(Request $request): JsonResponse
    {
        $projectType = ProjectType::findOrFail($request->input('id'));
        if ($projectType->projects->count()) return response()->json(['message' => trans('admin.error_delete_project_type')],403);
        else {
            $projectType->delete();
            return response()->json(['message' => trans('admin.delete_complete')],200);
        }
    }

    public function projects($slug=null): View
    {
        $this->getProjectsMenu();
        return $this->getSomething('projects', new Project(), $slug, new ProjectType());
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editProject(Request $request): RedirectResponse
    {
        $project = $this->editSomething (
            $request,
            new Project(),
            [
                'head' => $this->validationString,
                'date' => $this->validationDate,
                'text' => $this->validationText,
                'pdf' => $this->validationPdf,
                'project_type_id' => 'nullable|integer|exists:project_types,id',
            ],
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.project_types',['id' => $project->project_type_id]));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteProject(Request $request): JsonResponse
    {
        $project = Project::findOrFail($request->input('id'));
        if ($project->images->count()) {
            return response()->json(['message' => trans('admin.error_delete_project')],403);
        } else {
            $project->delete();
            return response()->json(['message' => trans('admin.delete_complete')],200);
        }
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addProjectImage(Request $request): RedirectResponse
    {
        $project = Project::select('id','project_type_id')->where('id',$request->input('project_id'))->first();
        $this->editSomething (
            $request,
            new ProjectImage(),
            [
                'image' => $this->validationJpgAndPng,
                'project_id' => 'required|integer|exists:projects,id'
            ],
            'images/projects/project_type'.$project->project_type_id.'/',
            'project'.$project->id.'_'
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.projects',['id' => $project->id, 'parent_id' => $project->project_type_id]));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteProjectImage(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new ProjectImage());
    }

    private function getProjectsMenu(): void
    {
        $this->getSubMenu(new ProjectType(), 'project_types', 'name');
    }
}
