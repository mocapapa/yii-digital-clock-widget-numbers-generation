<?php
  //
  // デジタルクロックの数字の画像ジェネレータ
  // $Id$
  //

// 定数定義 ----------------------------------------------------------------
$scale = 12;
$cos1 = cos(M_PI / 8);
$cos2 = cos(M_PI / 4);
$cos3 = cos(M_PI *3 / 8);
$cos4 = 1-$cos1;
$cos5 = 1-$cos2;
$cos6 = 1-$cos3;

// 小盤上の定義 ----------------------------------------------------------
$sBanWidth = 100 * $scale; // 100に特に意味は無い
$sBanHeight = 100/40*31 * $scale;
$sBanHeight2 = $sBanHeight/2;

// フォント定義
//$font = '/usr/share/fonts/liberation/LiberationMono-Bold.ttf';
//$fontPara = array(0.7, 0.08, 0.2);

$font = '/usr/share/fonts/dejavu-lgc/DejaVuLGCSans.ttf';
$fontPara = array(0.65, 0.068, 0.18); // フォントを見ながら微調整

$wScale = $fontPara[0];
$offX = $sBanWidth * $fontPara[1];
$offY = $sBanHeight * $fontPara[2];
//
$lineWidth = 3 * $scale;
$lineWidth2 = $lineWidth/2;

// 前の文字の小盤の生成
$s0Ban = ImageCreateTrueColor($sBanWidth, $sBanHeight);
//ImageAntiAlias($s0Ban, true);
ImageAlphaBlending($s0Ban, true);
// 次の文字の小盤の生成
$s1Ban = ImageCreateTrueColor($sBanWidth, $sBanHeight);
//ImageAntiAlias($s1Ban, true);
ImageAlphaBlending($s1Ban, true);
// 合成後の小盤の生成
$s2Ban = ImageCreateTrueColor($sBanWidth, $sBanHeight);
//ImageAntiAlias($s2Ban, true);
ImageAlphaBlending($s2Ban, true);

// 色の定義
$black = ImageColorAllocate($s0Ban, 0x00, 0x00, 0x00);
$gray1 = ImageColorAllocate($s0Ban, 0x11, 0x11, 0x11);
$gray2 = ImageColorAllocate($s0Ban, 0x22, 0x22, 0x22);
$gray3 = ImageColorAllocate($s0Ban, 0x33, 0x33, 0x33);
$gray4 = ImageColorAllocate($s0Ban, 0x44, 0x44, 0x44);
$gray5 = ImageColorAllocate($s0Ban, 0x55, 0x55, 0x55);
$gray6 = ImageColorAllocate($s0Ban, 0x66, 0x66, 0x66);
$gray7 = ImageColorAllocate($s0Ban, 0x77, 0x77, 0x77);
$gray8 = ImageColorAllocate($s0Ban, 0x88, 0x88, 0x88);
$gray9 = ImageColorAllocate($s0Ban, 0x99, 0x99, 0x99);
$graya = ImageColorAllocate($s0Ban, 0xaa, 0xaa, 0xaa);
$grayb = ImageColorAllocate($s0Ban, 0xbb, 0xbb, 0xbb);
$white = ImageColorAllocate($s0Ban, 0xff, 0xff, 0xff);

// 大盤上の定義 ----------------------------------------------------------
$width = 34;
$height = 26;
$height2 = $height/2;

$dBanWidth = $width * 60; // 横に60枚並ぶ
$dBanHeight = $height * 4; // 縦に4枚並ぶ
// 大盤の生成
$dBan = ImageCreateTrueColor($dBanWidth, $dBanHeight);
//ImageAntiAlias($dBan, true);
ImageAlphaBlending($dBan, true);

// 大盤の初期化、背景を黒色で塗りつぶす
//ImageColorTransparent($dBan, $back);
ImageFilledRectangle($dBan, 0,0, $dBanWidth, $dBanHeight, $black);

// フォントチェック
ImageFilledRectangle($s2Ban, 0,0, $sBanWidth, $sBanHeight, $black);
ImageFttext($s2Ban, $sBanHeight*$wScale, 0, $offX, transY($offY), ImageColorExact($s0Ban, 0xff, 0xff, 0xff), $font, sprintf("%02d", 0));
ImagePng($s2Ban, 'sban-font.png');


// 実行 ----------------------------------------------------------
// 横に60枚
for ($i = 0; $i < 60; $i++) {
  // 進捗率表示
  printf("%02d%%\n".chr(0x1b).'M', $i/60*100);

  if (($j = $i + 1) > 59) $j = 0;

  // 前の数字の描画
  ImageFilledRectangle($s2Ban, 0,0, $sBanWidth, $sBanHeight, $black);
  ImageFttext($s2Ban, $sBanHeight*$wScale, 0, $offX, transY($offY), ImageColorExact($s0Ban, 0xff, 0xff, 0xff), $font, sprintf("%02d", $i));
  // センターライン追加
  ImageFilledRectangle($s2Ban, 0, $sBanHeight/2 - $lineWidth2, $sBanWidth, $sBanHeight/2 + $lineWidth2, $black);
  // 文字ズラシ(上半分は上に、下半分は下に)
  ImageCopy($s0Ban, $s2Ban, 0, 0, 0, $lineWidth2, $sBanWidth, $sBanHeight - $lineWidth2);
  ImageCopy($s0Ban, $s2Ban, 0, $sBanHeight2 + $lineWidth2, 0, $sBanHeight2, $sBanWidth, $sBanHeight - $lineWidth2);
  // センターライン追加
  ImageFilledRectangle($s0Ban, 0, $sBanHeight/2 - $lineWidth2, $sBanWidth, $sBanHeight/2 + $lineWidth2, $black);

  // 次の数字の描画
  ImageFilledRectangle($s2Ban, 0,0, $sBanWidth, $sBanHeight, $black);
  ImageFttext($s2Ban, $sBanHeight*$wScale, 0, $offX, transY($offY), ImageColorExact($s0Ban, 0xff, 0xff, 0xff), $font, sprintf("%02d", $j));
  // センターライン追加
  ImageFilledRectangle($s2Ban, 0, $sBanHeight/2 - $lineWidth2, $sBanWidth, $sBanHeight/2 + $lineWidth2, $black);
  // 文字ズラシ(上半分は上に、下半分は下に)
  ImageCopy($s1Ban, $s2Ban, 0, 0, 0, $lineWidth2, $sBanWidth, $sBanHeight - $lineWidth2);
  ImageCopy($s1Ban, $s2Ban, 0, $sBanHeight2 + $lineWidth2, 0, $sBanHeight2, $sBanWidth, $sBanHeight - $lineWidth2);
  // センターライン追加
  ImageFilledRectangle($s1Ban, 0, $sBanHeight/2 - $lineWidth2, $sBanWidth, $sBanHeight/2 + $lineWidth2, $black);


  // 画像0
  $yPos = 0;
  ImageCopy($s2Ban, $s0Ban, 0, 0, 0, 0, $sBanWidth, $sBanHeight);
  // デバッグのため、保存
  if ($i < 5) ImagePng($s2Ban, sprintf("sban-%02d-0.png", $i));
  // 大盤上に縮小コピー
  ImageCopyResampled($dBan, $s2Ban, $i*$width, $yPos, 0, 0, $width, $height, $sBanWidth, $sBanHeight);


  // 画像1u
  $yPos += $height;
  ImageFilledRectangle($s2Ban, 0,0, $sBanWidth, $sBanHeight, $black);
  //
  ImageCopyResized($s2Ban, $s0Ban, 0, $sBanHeight2*$cos4, 0, 0, $sBanWidth, $sBanHeight2*$cos1, $sBanWidth, $sBanHeight2);
  ImageCopy($s2Ban, $s1Ban, 0, 0, 0, 0, $sBanWidth, $sBanHeight2*$cos4);
  // デバッグのため、保存
  // ImagePng($s2Ban, sprintf("sban-%02d-1u.png", $i));
  // 大盤上に縮小コピー
  ImageCopyResampled($dBan, $s2Ban, $i*$width, $yPos, 0, 0, $width, $height2, $sBanWidth, $sBanHeight2);


  // 画像2u
  $yPos += $height2;
  ImageFilledRectangle($s2Ban, 0,0, $sBanWidth, $sBanHeight, $black);
  //
  ImageCopyResized($s2Ban, $s0Ban, 0, $sBanHeight2*$cos5, 0, 0, $sBanWidth, $sBanHeight2*$cos2, $sBanWidth, $sBanHeight2);
  ImageCopy($s2Ban, $s1Ban, 0, 0, 0, 0, $sBanWidth, $sBanHeight2*$cos5);
  // デバッグのため、保存
  // ImagePng($s2Ban, sprintf("sban-%02d-2u.png", $i));
  // 大盤上に縮小コピー
  ImageCopyResampled($dBan, $s2Ban, $i*$width, $yPos, 0, 0, $width, $height2, $sBanWidth, $sBanHeight2);


  // 画像3u
  $yPos += $height2;
  ImageFilledRectangle($s2Ban, 0,0, $sBanWidth, $sBanHeight, $black);
  //
  ImageCopyResized($s2Ban, $s0Ban, 0, $sBanHeight2*$cos6, 0, 0, $sBanWidth, $sBanHeight2*$cos3, $sBanWidth, $sBanHeight2);
  ImageCopy($s2Ban, $s1Ban, 0, 0, 0, 0, $sBanWidth, $sBanHeight2*$cos6);
  // デバッグのため、保存
  // ImagePng($s2Ban, sprintf("sban-%02d-3u.png", $i));
  // 大盤上に縮小コピー
  ImageCopyResampled($dBan, $s2Ban, $i*$width, $yPos, 0, 0, $width, $height2, $sBanWidth, $sBanHeight2);


  // 画像5l
  $yPos += $height2;
  ImageFilledRectangle($s2Ban, 0,0, $sBanWidth, $sBanHeight, $black);
  //
  ImageCopy($s2Ban, $s0Ban, 0, $sBanHeight2*$cos3, 0, $sBanHeight2+$sBanHeight2*$cos3, $sBanWidth, $sBanHeight2*$cos6);
  ImageCopyResized($s2Ban, $s1Ban, 0, 0, 0, $sBanHeight2, $sBanWidth, $sBanHeight2*$cos3, $sBanWidth, $sBanHeight2);
  // デバッグのため、保存
  // ImagePng($s2Ban, sprintf("sban-%02d-5l.png", $i));
  // 大盤上に縮小コピー
  ImageCopyResampled($dBan, $s2Ban, $i*$width, $yPos, 0, 0, $width, $height2, $sBanWidth, $sBanHeight2);


  // 画像6l
  $yPos += $height2;
  ImageFilledRectangle($s2Ban, 0,0, $sBanWidth, $sBanHeight, $black);
  //
  ImageCopy($s2Ban, $s0Ban, 0, $sBanHeight2*$cos2, 0, $sBanHeight2+$sBanHeight2*$cos2, $sBanWidth, $sBanHeight2*$cos5);
  ImageCopyResized($s2Ban, $s1Ban, 0, 0, 0, $sBanHeight2, $sBanWidth, $sBanHeight2*$cos2, $sBanWidth, $sBanHeight2);
  // デバッグのため、保存
  // ImagePng($s2Ban, sprintf("sban-%02d-6l.png", $i));
  // 大盤上に縮小コピー
  ImageCopyResampled($dBan, $s2Ban, $i*$width, $yPos, 0, 0, $width, $height2, $sBanWidth, $sBanHeight2);


  // 画像7l
  $yPos += $height2;
  ImageFilledRectangle($s2Ban, 0,0, $sBanWidth, $sBanHeight, $black);
  //
  ImageCopy($s2Ban, $s0Ban, 0, $sBanHeight2*$cos1, 0, $sBanHeight2+$sBanHeight2*$cos1, $sBanWidth, $sBanHeight2*$cos4);
  ImageCopyResized($s2Ban, $s1Ban, 0, 0, 0, $sBanHeight2, $sBanWidth, $sBanHeight2*$cos1, $sBanWidth, $sBanHeight2);
  // デバッグのため、保存
  // ImagePng($s2Ban, sprintf("sban-%02d-7l.png", $i));
  // 大盤上に縮小コピー
  ImageCopyResampled($dBan, $s2Ban, $i*$width, $yPos, 0, 0, $width, $height2, $sBanWidth, $sBanHeight2);

}

ImagePng($dBan, 'digital-clock-numbers.png');

exit;

// 関数定義 ---------------------------------------------------------------------------------
// 左下原点の座標系からビットマップ座標系への変換
function transY($y)
{
  global $sBanHeight;
  return $sBanHeight - $y;
}
