<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogCommentRequest;
use App\Http\Requests\UpdateBlogCommentRequest;
use App\Repositories\BlogCommentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BlogCommentController extends AppBaseController
{
    /** @var  BlogCommentRepository */
    private $blogCommentRepository;

    public function __construct(BlogCommentRepository $blogCommentRepo)
    {
        $this->blogCommentRepository = $blogCommentRepo;
    }

    /**
     * Display a listing of the BlogComment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $blogComments = $this->blogCommentRepository->all();

        return view('blog_comments.index')
            ->with('blogComments', $blogComments);
    }

    /**
     * Show the form for creating a new BlogComment.
     *
     * @return Response
     */
    public function create()
    {
        return view('blog_comments.create');
    }

    /**
     * Store a newly created BlogComment in storage.
     *
     * @param CreateBlogCommentRequest $request
     *
     * @return Response
     */
    public function store(CreateBlogCommentRequest $request)
    {
        $input = $request->all();

        $blogComment = $this->blogCommentRepository->create($input);

        Flash::success('Blog Comment saved successfully.');

        return redirect(route('blogComments.index'));
    }

    /**
     * Display the specified BlogComment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $blogComment = $this->blogCommentRepository->find($id);

        if (empty($blogComment)) {
            Flash::error('Blog Comment not found');

            return redirect(route('blogComments.index'));
        }

        return view('blog_comments.show')->with('blogComment', $blogComment);
    }

    /**
     * Show the form for editing the specified BlogComment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $blogComment = $this->blogCommentRepository->find($id);

        if (empty($blogComment)) {
            Flash::error('Blog Comment not found');

            return redirect(route('blogComments.index'));
        }

        return view('blog_comments.edit')->with('blogComment', $blogComment);
    }

    /**
     * Update the specified BlogComment in storage.
     *
     * @param int $id
     * @param UpdateBlogCommentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBlogCommentRequest $request)
    {
        $blogComment = $this->blogCommentRepository->find($id);

        if (empty($blogComment)) {
            Flash::error('Blog Comment not found');

            return redirect(route('blogComments.index'));
        }

        $blogComment = $this->blogCommentRepository->update($request->all(), $id);

        Flash::success('Blog Comment updated successfully.');

        return redirect(route('blogComments.index'));
    }

    /**
     * Remove the specified BlogComment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $blogComment = $this->blogCommentRepository->find($id);

        if (empty($blogComment)) {
            Flash::error('Blog Comment not found');

            return redirect(route('blogComments.index'));
        }

        $this->blogCommentRepository->delete($id);

        Flash::success('Blog Comment deleted successfully.');

        return redirect(route('blogComments.index'));
    }
}
