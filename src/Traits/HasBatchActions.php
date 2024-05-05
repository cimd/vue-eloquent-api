<?php

namespace Konnec\VueEloquentApi\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Konnec\Examples\Requests\PostStoreRequest;
use Symfony\Component\HttpFoundation\InputBag;

trait HasBatchActions
{
    public function batchStore(Request $request): JsonResponse
    {
        $result = [];
        //        dump($request);
        //        ob_flush();
        foreach ($request->input('data') as $item) {
            $req = PostStoreRequest::createFrom($request);
//            $req->request = new InputBag($item);
//            $req->setJson($item->toJson());

//            var_dump($req);
//            ob_flush();

            $res = $this->store($req);
            $formatted = json_decode($res->getContent())->data;
            array_push($result, $formatted);
        }

        return response()->store($result);
    }

    public function batchUpdate(Request $request): JsonResponse
    {
        $result = [];
        foreach ($request->input('data') as $item) {
            $res = $this->update(new Request($item), ($this->model)::find($item['id']));
            $formatted = json_decode($res->getContent())->data;
            array_push($result, $formatted);
        }

        return response()->update($result);
    }

    public function batchDestroy(Request $request): JsonResponse
    {
        $result = [];
        foreach ($request->input('data') as $item) {
            $res = $this->destroy(($this->model)::find($item['id']));
            $formatted = json_decode($res->getContent())->data;
            array_push($result, $formatted);
        }

        return response()->destroy($result);
    }
}
