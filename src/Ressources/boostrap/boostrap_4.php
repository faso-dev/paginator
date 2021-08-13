<?php if ($pageCount > 1): ?>
    <nav>
        <ul class="pagination ">
            <?php if (isset($previousPage)) : ?>
                <li class="page-item">
                    <a class="page-link" rel="prev"
                       href="<?= request()->generate(['page' => $previousPage]) ?>">
                        &laquo;&nbsp;<?= $previousPageLabel ?>
                    </a>
                </li>
            <?php else : ?>
                <li class="page-item disabled">
                    <span class="page-link">
                        &laquo;&nbsp;<?= $previousPageLabel ?>
                    </span>
                </li>
            <?php endif; ?>

            <?php if ($startPage > 1)  : ?>
                <li class="page-item">
                    <a class="page-link" href="<?= request()->generate(['page' => 1]) ?>">
                        1
                    </a>
                </li>
                <?php if ($startPage == 3)  : ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= request()->generate(['page' => 2]) ?>">
                            2
                        </a>
                    </li>
                <?php elseif ($startPage != 2) : ?>
                    <li class="page-item disabled">
                        <span class="page-link">&hellip;</span>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
            <?php foreach ($rangePages as $page) : ?>
                <?php if ($page != $currentPage) : ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= request()->generate(['page' => $page]) ?>">
                            <?= $page ?>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="page-item active">
                        <span class="page-link">
                            <?= $page ?>
                        </span>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php if ($pageCount > $endPage) :
                if ($pageCount > $endPage + 1) :
                    if ($pageCount > $endPage + 2) :
                        ?>
                        <li class="page-item disabled">
                            <span class="page-link">&hellip;</span>
                        </li>
                    <?php else: ?>
                        <li class="page-item">
                            <a class="page-link"
                               href="<?= request()->generate(['page' => $pageCount - 1]) ?>">
                                <?= $pageCount - 1 ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <li class="page-item">
                    <a class="page-link" href="<?= request()->generate(['page' => $pageCount]) ?>">
                        <?= $pageCount ?>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (isset($nextPage)): ?>
                <li class="page-item">
                    <a class="page-link" rel="next" href="<?= request()->generate(['page' => $nextPage]) ?>">
                        <?= $nextPageLabel ?>&nbsp;&raquo;</a>
                </li>
            <?php else: ?>
                <li class="page-item disabled">
                    <span class="page-link">
                        <?= $nextPageLabel ?>&nbsp;&raquo;
                    </span>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
