@extends('layouts.app')

@section('container')
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-3">
        @include('components.mypage.menu')
        </div>
        <div class="col-lg-9">
            <div class="contanier">
                <div class="border rounded-3 p-2 bg-light mb-4">
                    <div class="row">
                        <h5>CSVをアップロードして一括発送通知</h5>
                        <div class="col-lg-3 p-3 d-flex flex-column" style="border-right: 1px solid #ddd;">
                            <a href="" class="btn btn-primary">CSVをダウンロード</a>
                            <p>お届け先のCSVをダウンロードできます。</p>
                        </div>
                        <div class="col-lg-9">
                            <div class="row p-2">
                                <form action="" method="post" class="p-2">
                                    <input type="file" name="import[csv]" id="import_csv" multipart accept=".csv" data-action="change->file-input#onChange" data-target="file-input.importCsvInput">
                                    <input type="submit" name="commit" value="一括発送通知をする" class="btn btn-warning" data-disable-with="一括発送通知をする">
                                    <p class="p-0 m-0">CSVに含まれる取引が一括発送されます。</p>
                                    <p class="p-0 m-0">エラーがある場合、エラー内容を含んだCSVがダウンロードされます</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border rounded-3 p-2 bg-light mb-4">
                    <div class="row">
                        <h5>一括発送可能な取引一覧</h5>
                        <div class="col-lg-12 p-5">
                            <p class="card-text">対象の取引はありません</p>
                            
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
