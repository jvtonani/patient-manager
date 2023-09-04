<div class="container mt-5">
        <h2><?php echo isset($patient) ? 'Atualizar Paciente' : 'Novo paciente' ?></h2>
        <form action="<?php echo isset($patient) ? '/patients/update' : '/patients/insert'; ?>" method="post">
            <?php if (isset($patient)) : ?>
                <input type="hidden" name="id" value="<?php echo $patient['id']; ?>">
            <?php endif; ?>

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" required <?php echo isset($patient) ? 'value="' . $patient['name'] . '"' : ''; ?>>
            </div>

            <div class="form-group">
                <label for="birthday">Data de Nascimento:</label>
                <input type="date" class="form-control" id="birthday" name="birthday" required <?php echo isset($patient) ? 'value="' . $patient['birthday'] . '"' : ''; ?>>
            </div>

            <div class="form-group">
                <label for="gender">Sexo:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="masculino" <?php echo isset($patient) && $patient['gender'] === 'masculino' ? 'selected' : ''; ?>>Masculino</option>
                    <option value="feminino" <?php echo isset($patient) && $patient['gender'] === 'feminino' ? 'selected' : ''; ?>>Feminino</option>
                    <option value="outro" <?php echo isset($patient) && $patient['gender'] === 'outro' ? 'selected' : ''; ?>>Outro</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary"><?php echo isset($patient) ? 'Atualizar' : 'Enviar'; ?></button>
        </form>
    </div>