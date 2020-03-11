<?php
  $hamburger = 4.95;
  $shake = 1.95;
  $cola = 0.85;

  $tip_rate = 0.16;
  $tax_rate = 0.075;

  $food = (2 * $hamburger) + $shake + $cola;
  $tip = $food * $tip_rate;
  $tax = $food * $tax_rate;

  $total = $food + $tip + $tax;

  printf("%d %-9s 単価： \$%.2f 小計： \$%5.2f\n", 2, 'ハンバーガー', $hamburger, 2 * $hamburger);
  printf("%d %-9s 単価： \$%.2f 小計： \$%5.2f\n", 1, 'シェイク', $shake, $hamburger);
  printf("%d %-9s 単価： \$%.2f 小計： \$%5.2f\n", 1, 'コーラ', $cola, $cola);
  printf("%25s: \$%5.2f\n", '合計（税抜）', $food);
  printf("%25s: \$%5.2f\n", '合計（税込）', $food + $tax);
  printf("%25s: \$%5.2f\n", '合計（税込＋チップ）', $total);
