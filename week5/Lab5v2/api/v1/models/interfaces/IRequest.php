<?php


/**
 *
 * @author User
 */
namespace Lab5\models\interfaces;
interface IRequest {
   
    public function POST(IModel $model);
    public function GET(IModel $model);
    public function PUT(IModel $model);
    public function DELETE(IModel $model);
}
