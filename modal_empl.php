
<!-- edit/ -->
<div class="modal fade" id="editModal_empl<?=$value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Редактировать сотрудника  <?=$value['name'] ?> <?=$value['last_name'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="?edit=<?=$value['id'] ?>" method="post">
          <div class="form-group">
            Имя
            <input type="text" class="form-control" name="edit_name" value="<?=$value['name'] ?>" placeholder="Имя">
          </div>
          <div class="form-group">
            Фамилия
            <input type="text" class="form-control" name="edit_last_name" value="<?=$value['last_name'] ?>" placeholder="Фамилия">
          </div>
          <div class="form-group">
            Должность
            <input type="text" class="form-control" name="edit_pos" value="<?=$value['pos'] ?>" placeholder="Должность">
          </div>
          <div class="form-group">
            Номер отдела
            <input type="text" class="form-control" name="edit_dep_id" value="<?=$value['department_ID'] ?>" placeholder="Номер отдела">
          </div>
          

          <div class="modal-footer">
            <button type="submit" name="edit-submit_empl" class="btn btn-primary">Обновить</button>
          </div>

        </form> 
      </div>
    </div>
  </div>
</div>
<!-- delete -->
<div class="modal fade" id="deleteModal_empl<?=$value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Удалить пользователя  <?=$value['name'] ?> <?=$value['last_name'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
        <form action="?id=<?=$value['id'] ?>" method="post">
          <button type="submit" name="delete_submit_empl" class="btn btn-danger">Удалить</button>
      </form>
      </div>
    </div>
  </div>
</div>

