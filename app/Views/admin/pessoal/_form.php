<?php use App\Helpers\FormatHelper; ?>

<form method="post" action="<?= BASE_URL ?>admin/pessoal/<?= isset($registro) ? 'atualizar/' . $registro['id'] : 'salvar' ?>">
        <!-- 🔹 Identificação Pessoal -->
        <fieldset class="mb-3">
            <legend class="h5 text-success"><i class="bi bi-person-vcard"></i> Dados do funcionário</legend>
            <div class="row g-3">

                <div class="col-md-3">
                    <label class="form-label">CÓD FUNCIONÁRIO</label>
                    <input type="text" class="form-control" name="staff_id" readonly
                           value="<?= $registro['staff_id'] ?? 'FUNC-' . date('YmdHis') ?>">
                </div>

                <div class="col-md-5">
                    <label class="form-label">NOME COMPLETO *</label>
                    <input type="text" class="form-control" name="nome" required
                           value="<?= $registro['nome'] ?? '' ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">CPF *</label>
                    <input type="text" class="form-control input-cpf" name="cpf" required
                           maxlength="14"
                           value="<?= FormatHelper::cpf($registro['cpf'] ?? '') ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">DATA NASCIMENTO</label>
                    <input type="date" class="form-control" name="nascimento"
                           value="<?= $registro['nascimento'] ?? '' ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">DATA ADMISSÃO *</label>
                    <input type="date" class="form-control" name="data_admissao" required
                           value="<?= $registro['data_admissao'] ?? '' ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">CELULAR</label>
                    <input type="text" class="form-control input-phone" name="telefone"
                           maxlength="16"
                           value="<?= FormatHelper::telefone($registro['telefone'] ?? '') ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">STATUS FUNCIONÁRIO</label>
                    <select name="status" class="form-select">
                        <option value="Ativo"     <?= ($registro['status'] ?? '') === 'Ativo' ? 'selected' : '' ?>>Ativo</option>
                        <option value="Afastado"  <?= ($registro['status'] ?? '') === 'Afastado' ? 'selected' : '' ?>>Afastado</option>
                        <option value="Férias"    <?= ($registro['status'] ?? '') === 'Férias' ? 'selected' : '' ?>>Férias</option>
                        <option value="Demitido"  <?= ($registro['status'] ?? '') === 'Demitido' ? 'selected' : '' ?>>Demitido</option>
                    </select>
                </div>
            </div>
        </fieldset>

        <!-- 🔹 Alocação -->
        <fieldset class="mb-3">
            <legend class="h5 text-success"><i class="bi bi-cone-striped"></i> Atuação na Obra</legend>
            <div class="row g-3">

                <div class="col-md-4">
                    <label class="form-label">FUNÇÃO *</label>
                    <select name="workRole" class="form-select" required>
                        <option value="" disabled selected>Selecione a função</option>
                        <?php foreach ($funcoes as $funcao): ?>
                            <option value="<?= $funcao['nome'] ?>"
                                <?= (isset($registro['funcao']) && $registro['funcao'] === $funcao['nome']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($funcao['nome']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">OBRA *</label>
                    <select class="form-select" name="obra_id" required>
                        <option value="" disabled selected>Selecione a obra</option>
                        <?php foreach ($obras as $obra): ?>
                            <option value="<?= $obra['id'] ?>"
                                <?= isset($registro['obra_id']) && $registro['obra_id'] == $obra['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($obra['descricao']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">JORNADA</label>
                    <select name="jornada" class="form-select">
                        <option value="8h"     <?= ($registro['jornada'] ?? '') === '8h' ? 'selected' : '' ?>>8h/dia</option>
                        <option value="6h"     <?= ($registro['jornada'] ?? '') === '6h' ? 'selected' : '' ?>>6h/dia</option>
                        <option value="4h"     <?= ($registro['jornada'] ?? '') === '4h' ? 'selected' : '' ?>>4h/dia</option>
                        <option value="Outros" <?= ($registro['jornada'] ?? '') === 'Outros' ? 'selected' : '' ?>>Outros</option>
                    </select>
                </div>
            </div>
        </fieldset>

        <!-- 🔹 Observações -->
        <fieldset class="mb-3">
            <legend class="h5 text-success"><i class="bi bi-list-columns-reverse"></i> Observações</legend>
            <div class="row g-3">
                <div class="col-12">
                    <textarea name="observacoes" rows="3" class="form-control"><?= $registro['observacoes'] ?? '' ?></textarea>
                </div>
            </div>
        </fieldset>

    <div class="d-flex flex-column flex-md-row gap-2 order-md-2 w-100 w-md-auto justify-content-md-end">
        <a href="<?= BASE_URL ?>admin" class="btn btn-primary"><i class="bi bi-speedometer2 me-1"></i> Painel</a>
        <a href="<?= BASE_URL ?>admin/pessoal" class="btn btn-danger"><i class="bi bi-x-circle me-1"></i> Cancelar</a>
        <button type="submit" class="btn btn-success"><i class="bi bi-save me-1"></i> Salvar</button>
    </div>
</form>
