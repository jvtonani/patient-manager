<div class="container-xxl p-2">
    <h2>Listagem de Pacientes</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Sexo</th>
                <th scope="col"></th>
                <th scope="col"></th>

            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($patients as $patient): ?>
                <tr>

                    <td>
                        <?php echo $patient['id']; ?>
                    </td>
                    <td>
                        <?php echo $patient['name']; ?>
                    </td>
                    <td>
                        <?php echo $patient['birthday']; ?>
                    </td>
                    <td>
                        <?php echo $patient['gender']; ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary">Editar</button>
                    </td>
                    <td>
                    <button type="button" class="btn btn-danger">Excluir</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>
        <?php echo $page->links('default','default_app'); ?>
    </div>

</div>