<?php

// Error reporting ko on karein taaki galtiyan saaf dikhein
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<pre>"; // Browser mein saaf output ke liye

echo "NumPHP Test Script Start...\n\n";

require_once __DIR__ . '/modules/numphp/autoload.php';
require_once __DIR__ . '/modules/numphp/NumPHP.php';

use NumPHP\NumPHP as np;

function print_arr($label, $arr) {
    echo $label . "\n";
    print_r($arr);
}

try {
    echo "--- Testing np::add() ---\n";
    $a = np::array([[1, 2], [3, 4]]);
    $b = np::array([[10, 20], [30, 40]]);
    print_arr("Array A:", $a->getData());
    print_arr("Array B:", $b->getData());
    $c = np::add($a, $b);
    print_arr("Result of A + B:", $c->getData());

    echo "\n--- Testing np::arcsin() ---\n";
    $x = np::array([0, 0.5, 1]);
    print_arr("Input:", $x->getData());
    $asin = np::arcsin($x);
    print_arr("Output:", $asin->getData());

    echo "\n--- Testing np::cube() ---\n";
    $cube = np::cube(np::array([1, -2, 3]));
    print_arr("Output:", $cube->getData());

    echo "\n--- Testing np::equal() ---\n";
    $eq = np::equal(np::array([1, 2, 3]), 2);
    print_arr("Output:", $eq->getData());

    echo "\n--- Testing np::sort() and np::argsort() ---\n";
    $unsorted = np::array([3, 1, 2]);
    print_arr("Input:", $unsorted->getData());
    $sorted = np::sort($unsorted);
    $argsorted = np::argsort($unsorted);
    print_arr("Sorted:", $sorted->getData());
    print_arr("Argsorted:", $argsorted->getData());

    echo "\n--- Testing np::lexsort() ---\n";
    $keys = [[2, 1, 2, 1], [0, 1, 0, 1]];
    print_arr("Keys:", $keys);
    $lex = np::lexsort($keys);
    print_arr("Output:", $lex->getData());

    echo "\n--- Testing np::swapaxes() ---\n";
    $m = np::array([[1, 2, 3], [4, 5, 6]]);
    print_arr("Input:", $m->getData());
    $swapped = np::swapaxes($m, 0, 1);
    print_arr("Output:", $swapped->getData());

    echo "\n--- Testing np::fill_diagonal() ---\n";
    $diag = np::array([[1, 2, 3], [4, 5, 6], [7, 8, 9]]);
    print_arr("Before:", $diag->getData());
    np::fill_diagonal($diag, 0);
    print_arr("After:", $diag->getData());

    echo "\n--- Testing np::fromfunction() ---\n";
    $ff = np::fromfunction(function ($i, $j) { return $i + $j; }, [2, 3]);
    print_arr("Output:", $ff->getData());

    echo "\n--- Testing np::fromiter() ---\n";
    $fi = np::fromiter([10, 20, 30, 40], null, 3);
    print_arr("Output:", $fi->getData());

    echo "\n--- Testing np::seed(), np::rand(), np::shuffle(), np::permutation() ---\n";
    np::seed(123);
    $r = np::rand([2, 2]);
    print_arr("rand:", $r->getData());
    $sh = np::array([1, 2, 3, 4]);
    np::shuffle($sh);
    print_arr("shuffle:", $sh->getData());
    $perm = np::permutation(5);
    print_arr("permutation:", $perm->getData());

    echo "\n--- Testing np::eig(), np::svd(), np::qr() ---\n";
    $A = np::array([[3, 1], [0, 2]]);
    print_arr("Input:", $A->getData());
    [$eigvals, $eigvecs] = np::eig($A);
    print_arr("eigvals:", $eigvals->getData());
    print_arr("eigvecs:", $eigvecs->getData());
    [$U, $S, $Vt] = np::svd($A);
    print_arr("U:", $U->getData());
    print_arr("S:", $S->getData());
    print_arr("Vt:", $Vt->getData());
    [$Q, $R] = np::qr($A);
    print_arr("Q:", $Q->getData());
    print_arr("R:", $R->getData());

    echo "\n--- Phase 1 Functions ---\n";

    echo "\nnp::absolute()\n";
    print_arr("Input:", np::array([-1, 2, -3])->getData());
    print_arr("Output:", np::absolute(np::array([-1, 2, -3]))->getData());

    echo "\nnp::fix()\n";
    print_arr("Input:", np::array([1.9, -1.9])->getData());
    print_arr("Output:", np::fix(np::array([1.9, -1.9]))->getData());

    echo "\nnp::ldexp()\n";
    print_arr("Output:", np::ldexp(np::array([1, 2]), 3)->getData());

    echo "\nnp::signbit()\n";
    print_arr("Output:", np::signbit(np::array([-1, 0, 2]))->getData());

    echo "\nnp::spacing()\n";
    print_arr("Output:", np::spacing(np::array([1.0]))->getData());

    echo "\nnp::fmin()\n";
    print_arr("Output:", np::fmin(np::array([1, 5]), 3)->getData());

    echo "\nnp::fmax()\n";
    print_arr("Output:", np::fmax(np::array([1, 5]), 3)->getData());

    echo "\nnp::real()\n";
    print_arr("Output:", np::real(np::array([1, 2]))->getData());

    echo "\nnp::imag()\n";
    print_arr("Output:", np::imag(np::array([1, 2]))->getData());

    echo "\nnp::conj()\n";
    print_arr("Output:", np::conj(np::array([1, 2]))->getData());

    echo "\nnp::conjugate()\n";
    print_arr("Output:", np::conjugate(np::array([1, 2]))->getData());

    echo "\nnp::remainder()\n";
    print_arr("Output:", np::remainder(np::array([5, 7]), 2)->getData());

    echo "\nnp::floor_divide()\n";
    print_arr("Output:", np::floor_divide(np::array([5, 7]), 2)->getData());

    echo "\nnp::trunc()\n";
    print_arr("Output:", np::trunc(np::array([1.9, -1.9]))->getData());

    echo "\nnp::angle()\n";
    print_arr("Output:", np::angle(np::array([1, -1]))->getData());

    echo "\nnp::frexp()\n";
    $fx = np::frexp(np::array([8]));
    print_arr("Mantissa:", $fx[0]->getData());
    print_arr("Exponent:", $fx[1]->getData());

    echo "\nnp::mod()\n";
    print_arr("Output:", np::mod(np::array([5, 7]), 2)->getData());

    echo "\nnp::around()\n";
    print_arr("Output:", np::around(np::array([1.234]), 2)->getData());

    echo "\nnp::divmod()\n";
    $dv = np::divmod(np::array([7]), 3);
    print_arr("Quotient:", $dv[0]->getData());
    print_arr("Remainder:", $dv[1]->getData());

    echo "\nnp::rad2deg()\n";
    print_arr("Output:", np::rad2deg(np::array([M_PI]))->getData());

    echo "\nnp::deg2rad()\n";
    print_arr("Output:", np::deg2rad(np::array([180]))->getData());

    echo "\nnp::modf()\n";
    $mf = np::modf(np::array([1.5]));
    print_arr("Fractional:", $mf[0]->getData());
    print_arr("Integral:", $mf[1]->getData());

    echo "\nnp::i0()\n";
    print_arr("Output:", np::i0(np::array([1.0]))->getData());

    echo "\nnp::nextafter()\n";
    print_arr("Output:", np::nextafter(np::array([1.0]), 2.0)->getData());

    echo "\nnp::rint()\n";
    print_arr("Output:", np::rint(np::array([1.5, 2.5]))->getData());

    echo "\nnp::float_power()\n";
    print_arr("Output:", np::float_power(np::array([2, 3]), 2)->getData());

    echo "\nnp::exp2()\n";
    print_arr("Output:", np::exp2(np::array([3]))->getData());

    echo "\nnp::log1p()\n";
    print_arr("Output:", np::log1p(np::array([1]))->getData());

    echo "\nnp::logaddexp()\n";
    print_arr("Output:", np::logaddexp(np::array([1]), 2)->getData());

    echo "\nnp::logaddexp2()\n";
    print_arr("Output:", np::logaddexp2(np::array([1]), 2)->getData());

    echo "\nnp::array_equal()\n";
    var_export(np::array_equal(np::array([1,2]), np::array([1,2])));
    echo "\n";

    echo "\nnp::array_equiv()\n";
    var_export(np::array_equiv(np::array([1,2]), np::array([1,2])));
    echo "\n";

    echo "\nnp::logical_xor()\n";
    print_arr("Output:", np::logical_xor(np::array([1,0]), np::array([0,1]))->getData());

    echo "\nnp::msort()\n";
    print_arr("Output:", np::msort(np::array([3,1,2]))->getData());

    echo "\nnp::sort_complex()\n";
    print_arr("Output:", np::sort_complex(np::array([3,1,2]))->getData());

    echo "\nnp::random()\n";
    var_export(np::random());
    echo "\n";

    echo "\nnp::randint()\n";
    print_arr("Output:", np::randint(0, 5, [2,2])->getData());

    echo "\nnp::empty()\n";
    print_arr("Output:", np::empty([2,2])->getData());

    echo "\nnp::mat()\n";
    print_arr("Output:", np::mat('1 2; 3 4')->getData());

    echo "\nnp::meshgrid()\n";
    $mg = np::meshgrid([1,2], [3,4]);
    print_arr("X:", $mg[0]->getData());
    print_arr("Y:", $mg[1]->getData());

    echo "\nnp::mgrid()\n";
    $mg2 = np::mgrid([1,2], [3,4]);
    print_arr("X:", $mg2[0]->getData());
    print_arr("Y:", $mg2[1]->getData());

    echo "\nnp::ogrid()\n";
    $og = np::ogrid([1,2], [3,4]);
    print_arr("X:", $og[0]->getData());
    print_arr("Y:", $og[1]->getData());

    echo "\nnp::bmat()\n";
    $bm = np::bmat([ [ np::array([[1]]), np::array([[2]]) ] ]);
    print_arr("Output:", $bm->getData());

    echo "\nnp::rot90()\n";
    print_arr("Output:", np::rot90(np::array([[1,2],[3,4]]))->getData());

    echo "\nnp::row_stack()\n";
    print_arr("Output:", np::row_stack([np::array([1,2]), np::array([3,4])])->getData());

    echo "\nnp::moveaxis()\n";
    print_arr("Output:", np::moveaxis(np::array([[1,2],[3,4]]), 0, 1)->getData());

    echo "\nnp::broadcast_arrays()\n";
    $ba = np::broadcast_arrays(np::array(1), np::array([[2,3],[4,5]]));
    print_arr("A:", $ba[0]->getData());
    print_arr("B:", $ba[1]->getData());

    echo "\nnp::array_split()\n";
    $as = np::array_split(np::array([1,2,3,4]), 2);
    print_arr("Part1:", $as[0]->getData());
    print_arr("Part2:", $as[1]->getData());

    echo "\nnp::ndim()\n";
    var_export(np::ndim(np::array([[1,2]])));
    echo "\n";

    echo "\nnp::size()\n";
    var_export(np::size(np::array([[1,2],[3,4]])));
    echo "\n";

    echo "\nnp::fliplr()\n";
    print_arr("Output:", np::fliplr(np::array([[1,2],[3,4]]))->getData());

    echo "\nnp::flipud()\n";
    print_arr("Output:", np::flipud(np::array([[1,2],[3,4]]))->getData());

    echo "\nnp::copyto()\n";
    $ca = np::array([1,2]);
    $cb = np::array([3,4]);
    np::copyto($ca, $cb);
    print_arr("Output:", $ca->getData());

    echo "\nnp::unique()\n";
    print_arr("Output:", np::unique(np::array([1,2,2,3]))->getData());

    echo "\nnp::shape()\n";
    print_arr("Output:", np::shape(np::array([[1,2],[3,4]]))); 

    echo "\nnp::broadcast_to()\n";
    print_arr("Output:", np::broadcast_to(np::array(1), [2,2])->getData());

    echo "\nnp::resize()\n";
    print_arr("Output:", np::resize(np::array([1,2,3]), [2,2])->getData());

    echo "\nnp::rollaxis()\n";
    print_arr("Output:", np::rollaxis(np::array([[1,2],[3,4]]), 0, 1)->getData());

    echo "\nnp::binary_repr()\n";
    var_export(np::binary_repr(5, 4));
    echo "\n";

    echo "\nnp::packbits()\n";
    print_arr("Output:", np::packbits(np::array([1,0,1,0,1,0,1,0]))->getData());

    echo "\nnp::unpackbits()\n";
    print_arr("Output:", np::unpackbits(np::array([170]))->getData());

    echo "\nnp::dtype()\n";
    var_export(np::dtype(np::array([1,2])));
    echo "\n";

    echo "\nnp::typename()\n";
    var_export(np::typename(1));
    echo "\n";

    echo "\nnp::result_type()\n";
    var_export(np::result_type(1, 2.0));
    echo "\n";

    echo "\nnp::promote_types()\n";
    var_export(np::promote_types('int', 'float'));
    echo "\n";

    echo "\nnp::common_type()\n";
    var_export(np::common_type(1, 2.0));
    echo "\n";

    echo "\nnp::find_common_type()\n";
    var_export(np::find_common_type(['int', 'float']));
    echo "\n";

    echo "\nnp::isdtype()\n";
    var_export(np::isdtype('int', 'int'));
    echo "\n";

    echo "\nnp::issubdtype()\n";
    var_export(np::issubdtype('int', 'int'));
    echo "\n";

    echo "\nnp::issubsctype()\n";
    var_export(np::issubsctype('int', 'int'));
    echo "\n";

    echo "\nnp::issubclass_()\n";
    var_export(np::issubclass_('Exception', 'Throwable'));
    echo "\n";

    echo "\nnp::min_scalar_type()\n";
    var_export(np::min_scalar_type(1.0));
    echo "\n";

    echo "\nnp::mintypecode()\n";
    var_export(np::mintypecode(['int', 'float']));
    echo "\n";

    echo "\nnp::sctype2char()\n";
    var_export(np::sctype2char('float'));
    echo "\n";

    echo "\nnp::obj2sctype()\n";
    var_export(np::obj2sctype(1));
    echo "\n";

    echo "\nnp::rank()\n";
    var_export(np::rank(np::array([[1,2]])));
    echo "\n";

    echo "\n--- Phase 2 Functions ---\n";

    echo "\nnp::amin() / np::amax()\n";
    $am = np::array([3, 1, 2]);
    print_arr("Input:", $am->getData());
    var_export(np::amin($am));
    echo "\n";
    var_export(np::amax($am));
    echo "\n";

    echo "\nnp::nanprod()\n";
    var_export(np::nanprod(np::array([1, NAN, 3])));
    echo "\n";

    echo "\nnp::nanargmax() / np::nanargmin()\n";
    var_export(np::nanargmax(np::array([1, NAN, 5, 2])));
    echo "\n";
    var_export(np::nanargmin(np::array([1, NAN, -3, 2])));
    echo "\n";

    echo "\nnp::nanquantile() / np::nanpercentile()\n";
    var_export(np::nanquantile(np::array([1, NAN, 3, 5]), 0.5));
    echo "\n";
    var_export(np::nanpercentile(np::array([1, NAN, 3, 5]), 50));
    echo "\n";

    echo "\nnp::nancumprod()\n";
    print_arr("Output:", np::nancumprod(np::array([1, NAN, 2, 3]))->getData());

    echo "\nnp::histogram2d()\n";
    $hx = np::array([0, 1, 1, 0]);
    $hy = np::array([0, 0, 1, 1]);
    $h2 = np::histogram2d($hx, $hy, 2);
    print_arr("Hist:", $h2[0]->getData());
    print_arr("X edges:", $h2[1]->getData());
    print_arr("Y edges:", $h2[2]->getData());

    echo "\nnp::histogramdd()\n";
    $samples = np::array([[0,0],[1,1],[1,0],[0,1]]);
    $hdd = np::histogramdd($samples, 2);
    print_arr("Hist:", $hdd[0]->getData());

    echo "\nnp::correlate()\n";
    print_arr("Output:", np::correlate(np::array([1,2,3]), np::array([0,1]))->getData());

    echo "\nnp::extract()\n";
    $cond = np::array([true, false, true, false]);
    $arr = np::array([10, 20, 30, 40]);
    print_arr("Output:", np::extract($cond, $arr)->getData());

    echo "\nnp::flatnonzero()\n";
    print_arr("Output:", np::flatnonzero(np::array([0, 1, 0, 2]))->getData());

    echo "\nnp::ravel_multi_index()\n";
    $rmi = np::ravel_multi_index([[1,0,1],[2,1,0]], [2,3]);
    print_arr("Output:", $rmi);

    echo "\nnp::take_along_axis()\n";
    $ta = np::array([[10,20],[30,40]]);
    $idx = np::array([[1,0],[0,1]]);
    print_arr("Output:", np::take_along_axis($ta, $idx, 1)->getData());

    echo "\nnp::place()\n";
    $pl = np::array([1,2,3,4]);
    np::place($pl, np::array([true,false,true,false]), [9,8]);
    print_arr("Output:", $pl->getData());

    echo "\nnp::tril_indices() / np::triu_indices()\n";
    $ti = np::tril_indices(3);
    print_arr("tril rows:", $ti[0]->getData());
    print_arr("tril cols:", $ti[1]->getData());
    $tu = np::triu_indices(3);
    print_arr("triu rows:", $tu[0]->getData());
    print_arr("triu cols:", $tu[1]->getData());

    echo "\nnp::tril_indices_from() / np::triu_indices_from()\n";
    $mat3 = np::array([[1,2,3],[4,5,6],[7,8,9]]);
    $tif = np::tril_indices_from($mat3);
    print_arr("tril_from rows:", $tif[0]->getData());
    print_arr("tril_from cols:", $tif[1]->getData());
    $tuf = np::triu_indices_from($mat3);
    print_arr("triu_from rows:", $tuf[0]->getData());
    print_arr("triu_from cols:", $tuf[1]->getData());

    echo "\nnp::diag_indices() / np::diag_indices_from()\n";
    $di = np::diag_indices(3);
    print_arr("diag rows:", $di[0]->getData());
    print_arr("diag cols:", $di[1]->getData());
    $dif = np::diag_indices_from($mat3);
    print_arr("diag_from rows:", $dif[0]->getData());
    print_arr("diag_from cols:", $dif[1]->getData());

    echo "\nnp::diagonal()\n";
    print_arr("Output:", np::diagonal($mat3)->getData());

    echo "\nnp::indices()\n";
    $inds = np::indices([2,3]);
    print_arr("Index 0:", $inds[0]->getData());
    print_arr("Index 1:", $inds[1]->getData());

    echo "\nnp::put()\n";
    $pa = np::array([10,20,30,40]);
    np::put($pa, [1,3], [99, 88]);
    print_arr("Output:", $pa->getData());

    echo "\nnp::put_along_axis()\n";
    $paa = np::array([[1,2],[3,4]]);
    $pidx = np::array([[1,0],[0,1]]);
    $pval = np::array([[9,8],[7,6]]);
    np::put_along_axis($paa, $pidx, $pval, 1);
    print_arr("Output:", $paa->getData());

    echo "\nnp::ix_()\n";
    $ix = np::ix_([0,2], [1,3]);
    print_arr("ix0:", $ix[0]->getData());
    print_arr("ix1:", $ix[1]->getData());

    echo "\nnp::unravel_index()\n";
    $ui = np::unravel_index(5, [2,3]);
    print_arr("Output:", $ui);

    echo "\nnp::mask_indices()\n";
    $mi = np::mask_indices(3, function ($a) { return np::tril($a); });
    print_arr("mask rows:", $mi[0]->getData());
    print_arr("mask cols:", $mi[1]->getData());

    echo "\nnp::diagflat()\n";
    print_arr("Output:", np::diagflat(np::array([1,2,3]))->getData());

    echo "\nnp::matrix_transpose()\n";
    print_arr("Output:", np::matrix_transpose(np::array([[1,2],[3,4]]))->getData());

    echo "\nnp::linalg()\n";
    $lin = np::linalg();
    print_arr("Class:", get_class($lin));

    echo "\nnp::einsum() / np::einsum_path()\n";
    $ea = np::array([[1,2],[3,4]]);
    $eb = np::array([[5,6],[7,8]]);
    print_arr("einsum:", np::einsum('ij,jk->ik', $ea, $eb)->getData());
    print_arr("einsum_path:", np::einsum_path('ij,jk->ik'));

    echo "\nnp::tensordot()\n";
    print_arr("Output:", np::tensordot($ea, $eb, 1)->getData());

    echo "\nnp::tensorsolve()\n";
    $tsA = np::array([[2,0],[0,2]]);
    $tsB = np::array([2,4]);
    print_arr("Output:", np::tensorsolve($tsA, $tsB)->getData());

    echo "\nnp::slogdet()\n";
    $sd = np::slogdet($ea);
    print_arr("Sign:", $sd[0]->getData());
    print_arr("LogAbs:", $sd[1]->getData());

    echo "\nnp::eigvals() / np::eigvalsh() / np::eigh()\n";
    print_arr("eigvals:", np::eigvals($ea)->getData());
    print_arr("eigvalsh:", np::eigvalsh($ea)->getData());
    $eh = np::eigh($ea);
    print_arr("eigh vals:", $eh[0]->getData());
    print_arr("eigh vecs:", $eh[1]->getData());

    echo "\nnp::matrix_rank()\n";
    var_export(np::matrix_rank($ea));
    echo "\n";

    echo "\nnp::vdot()\n";
    var_export(np::vdot(np::array([1,2]), np::array([3,4])));
    echo "\n";

    echo "\nnp::cond()\n";
    var_export(np::cond($ea));
    echo "\n";

    echo "\nnp::tensorinv()\n";
    print_arr("Output:", np::tensorinv(np::array([[1,0],[0,2]]))->getData());


    echo "\n--- Remaining Functions ---\n";
    $pm = np::array([1,2,3]);
    echo "\nnp::False_()\n";
    try {
        $res_False_ = np::False_();
        if ($res_False_ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_False_->getData()); } else { var_export($res_False_); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::ScalarType()\n";
    try {
        $res_ScalarType = np::ScalarType();
        if ($res_ScalarType instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_ScalarType->getData()); } else { var_export($res_ScalarType); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::True_()\n";
    try {
        $res_True_ = np::True_();
        if ($res_True_ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_True_->getData()); } else { var_export($res_True_); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::_CopyMode()\n";
    try {
        $res__CopyMode = np::_CopyMode();
        if ($res__CopyMode instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res__CopyMode->getData()); } else { var_export($res__CopyMode); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::_NoValue()\n";
    try {
        $res__NoValue = np::_NoValue();
        if ($res__NoValue instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res__NoValue->getData()); } else { var_export($res__NoValue); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__NUMPY_SETUP__()\n";
    try {
        $res___NUMPY_SETUP__ = np::__NUMPY_SETUP__();
        if ($res___NUMPY_SETUP__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___NUMPY_SETUP__->getData()); } else { var_export($res___NUMPY_SETUP__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__all__()\n";
    try {
        $res___all__ = np::__all__();
        if ($res___all__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___all__->getData()); } else { var_export($res___all__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__array_api_version__()\n";
    try {
        $res___array_api_version__ = np::__array_api_version__();
        if ($res___array_api_version__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___array_api_version__->getData()); } else { var_export($res___array_api_version__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__array_namespace_info__()\n";
    try {
        $res___array_namespace_info__ = np::__array_namespace_info__();
        if ($res___array_namespace_info__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___array_namespace_info__->getData()); } else { var_export($res___array_namespace_info__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__builtins__()\n";
    try {
        $res___builtins__ = np::__builtins__();
        if ($res___builtins__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___builtins__->getData()); } else { var_export($res___builtins__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__cached__()\n";
    try {
        $res___cached__ = np::__cached__();
        if ($res___cached__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___cached__->getData()); } else { var_export($res___cached__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__config__()\n";
    try {
        $res___config__ = np::__config__();
        if ($res___config__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___config__->getData()); } else { var_export($res___config__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__dir__()\n";
    try {
        $res___dir__ = np::__dir__();
        if ($res___dir__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___dir__->getData()); } else { var_export($res___dir__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__doc__()\n";
    try {
        $res___doc__ = np::__doc__();
        if ($res___doc__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___doc__->getData()); } else { var_export($res___doc__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__expired_attributes__()\n";
    try {
        $res___expired_attributes__ = np::__expired_attributes__();
        if ($res___expired_attributes__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___expired_attributes__->getData()); } else { var_export($res___expired_attributes__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__file__()\n";
    try {
        $res___file__ = np::__file__();
        if ($res___file__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___file__->getData()); } else { var_export($res___file__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__former_attrs__()\n";
    try {
        $res___former_attrs__ = np::__former_attrs__();
        if ($res___former_attrs__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___former_attrs__->getData()); } else { var_export($res___former_attrs__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__future_scalars__()\n";
    try {
        $res___future_scalars__ = np::__future_scalars__();
        if ($res___future_scalars__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___future_scalars__->getData()); } else { var_export($res___future_scalars__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__getattr__()\n";
    try {
        $res___getattr__ = np::__getattr__();
        if ($res___getattr__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___getattr__->getData()); } else { var_export($res___getattr__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__loader__()\n";
    try {
        $res___loader__ = np::__loader__();
        if ($res___loader__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___loader__->getData()); } else { var_export($res___loader__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__name__()\n";
    try {
        $res___name__ = np::__name__();
        if ($res___name__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___name__->getData()); } else { var_export($res___name__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__numpy_submodules__()\n";
    try {
        $res___numpy_submodules__ = np::__numpy_submodules__();
        if ($res___numpy_submodules__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___numpy_submodules__->getData()); } else { var_export($res___numpy_submodules__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__package__()\n";
    try {
        $res___package__ = np::__package__();
        if ($res___package__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___package__->getData()); } else { var_export($res___package__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__path__()\n";
    try {
        $res___path__ = np::__path__();
        if ($res___path__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___path__->getData()); } else { var_export($res___path__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__spec__()\n";
    try {
        $res___spec__ = np::__spec__();
        if ($res___spec__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___spec__->getData()); } else { var_export($res___spec__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::__version__()\n";
    try {
        $res___version__ = np::__version__();
        if ($res___version__ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res___version__->getData()); } else { var_export($res___version__); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::_array_api_info()\n";
    try {
        $res__array_api_info = np::_array_api_info();
        if ($res__array_api_info instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res__array_api_info->getData()); } else { var_export($res__array_api_info); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::_core()\n";
    try {
        $res__core = np::_core();
        if ($res__core instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res__core->getData()); } else { var_export($res__core); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::_distributor_init()\n";
    try {
        $res__distributor_init = np::_distributor_init();
        if ($res__distributor_init instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res__distributor_init->getData()); } else { var_export($res__distributor_init); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::_expired_attrs_2_0()\n";
    try {
        $res__expired_attrs_2_0 = np::_expired_attrs_2_0();
        if ($res__expired_attrs_2_0 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res__expired_attrs_2_0->getData()); } else { var_export($res__expired_attrs_2_0); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::_globals()\n";
    try {
        $res__globals = np::_globals();
        if ($res__globals instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res__globals->getData()); } else { var_export($res__globals); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::_int_extended_msg()\n";
    try {
        $res__int_extended_msg = np::_int_extended_msg();
        if ($res__int_extended_msg instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res__int_extended_msg->getData()); } else { var_export($res__int_extended_msg); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::_mat()\n";
    try {
        $res__mat = np::_mat();
        if ($res__mat instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res__mat->getData()); } else { var_export($res__mat); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::_msg()\n";
    try {
        $res__msg = np::_msg();
        if ($res__msg instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res__msg->getData()); } else { var_export($res__msg); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::_pyinstaller_hooks_dir()\n";
    try {
        $res__pyinstaller_hooks_dir = np::_pyinstaller_hooks_dir();
        if ($res__pyinstaller_hooks_dir instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res__pyinstaller_hooks_dir->getData()); } else { var_export($res__pyinstaller_hooks_dir); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::_pytesttester()\n";
    try {
        $res__pytesttester = np::_pytesttester();
        if ($res__pytesttester instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res__pytesttester->getData()); } else { var_export($res__pytesttester); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::_specific_msg()\n";
    try {
        $res__specific_msg = np::_specific_msg();
        if ($res__specific_msg instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res__specific_msg->getData()); } else { var_export($res__specific_msg); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::_type_info()\n";
    try {
        $res__type_info = np::_type_info();
        if ($res__type_info instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res__type_info->getData()); } else { var_export($res__type_info); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::_typing()\n";
    try {
        $res__typing = np::_typing();
        if ($res__typing instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res__typing->getData()); } else { var_export($res__typing); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::_utils()\n";
    try {
        $res__utils = np::_utils();
        if ($res__utils instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res__utils->getData()); } else { var_export($res__utils); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::abs()\n";
    try {
        $res_abs = np::abs(np::array([1,2]));
        if ($res_abs instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_abs->getData()); } else { var_export($res_abs); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::acos()\n";
    try {
        $res_acos = np::acos(np::array([1,2]));
        if ($res_acos instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_acos->getData()); } else { var_export($res_acos); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::acosh()\n";
    try {
        $res_acosh = np::acosh(np::array([1,2]));
        if ($res_acosh instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_acosh->getData()); } else { var_export($res_acosh); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::all()\n";
    try {
        $res_all = np::all(np::array([1,2]));
        if ($res_all instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_all->getData()); } else { var_export($res_all); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::allclose()\n";
    try {
        $res_allclose = np::allclose(np::array([1,2]), np::array([1,2]));
        if ($res_allclose instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_allclose->getData()); } else { var_export($res_allclose); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::any()\n";
    try {
        $res_any = np::any(np::array([1,2]));
        if ($res_any instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_any->getData()); } else { var_export($res_any); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::append()\n";
    try {
        $res_append = np::append(np::array([1,2]), 1);
        if ($res_append instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_append->getData()); } else { var_export($res_append); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::apply_along_axis()\n";
    try {
        $res_apply_along_axis = np::apply_along_axis(function($x){return $x;}, 0, np::array([1,2]));
        if ($res_apply_along_axis instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_apply_along_axis->getData()); } else { var_export($res_apply_along_axis); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::apply_over_axes()\n";
    try {
        $res_apply_over_axes = np::apply_over_axes(function($x){return $x;}, np::array([1,2]), [np::array([1]), np::array([2])]);
        if ($res_apply_over_axes instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_apply_over_axes->getData()); } else { var_export($res_apply_over_axes); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::arange()\n";
    try {
        $res_arange = np::arange(0);
        if ($res_arange instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_arange->getData()); } else { var_export($res_arange); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::arccos()\n";
    try {
        $res_arccos = np::arccos(np::array([1,2]));
        if ($res_arccos instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_arccos->getData()); } else { var_export($res_arccos); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::arccosh()\n";
    try {
        $res_arccosh = np::arccosh(np::array([1,2]));
        if ($res_arccosh instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_arccosh->getData()); } else { var_export($res_arccosh); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::arcsinh()\n";
    try {
        $res_arcsinh = np::arcsinh(np::array([1,2]));
        if ($res_arcsinh instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_arcsinh->getData()); } else { var_export($res_arcsinh); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::arctan()\n";
    try {
        $res_arctan = np::arctan(np::array([1,2]));
        if ($res_arctan instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_arctan->getData()); } else { var_export($res_arctan); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::arctan2()\n";
    try {
        $res_arctan2 = np::arctan2(np::array([1,2]), np::array([1,2]));
        if ($res_arctan2 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_arctan2->getData()); } else { var_export($res_arctan2); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::arctanh()\n";
    try {
        $res_arctanh = np::arctanh(np::array([1,2]));
        if ($res_arctanh instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_arctanh->getData()); } else { var_export($res_arctanh); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::argmax()\n";
    try {
        $res_argmax = np::argmax(np::array([1,2]));
        if ($res_argmax instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_argmax->getData()); } else { var_export($res_argmax); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::argmin()\n";
    try {
        $res_argmin = np::argmin(np::array([1,2]));
        if ($res_argmin instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_argmin->getData()); } else { var_export($res_argmin); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::argpartition()\n";
    try {
        $res_argpartition = np::argpartition(np::array([1,2]), 1);
        if ($res_argpartition instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_argpartition->getData()); } else { var_export($res_argpartition); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::argwhere()\n";
    try {
        $res_argwhere = np::argwhere(np::array([1,2]));
        if ($res_argwhere instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_argwhere->getData()); } else { var_export($res_argwhere); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::array2string()\n";
    try {
        $res_array2string = np::array2string(np::array([1,2]));
        if ($res_array2string instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_array2string->getData()); } else { var_export($res_array2string); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::array_repr()\n";
    try {
        $res_array_repr = np::array_repr(np::array([1,2]));
        if ($res_array_repr instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_array_repr->getData()); } else { var_export($res_array_repr); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::array_str()\n";
    try {
        $res_array_str = np::array_str(np::array([1,2]));
        if ($res_array_str instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_array_str->getData()); } else { var_export($res_array_str); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::asanyarray()\n";
    try {
        $res_asanyarray = np::asanyarray(1);
        if ($res_asanyarray instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_asanyarray->getData()); } else { var_export($res_asanyarray); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::asarray()\n";
    try {
        $res_asarray = np::asarray(1);
        if ($res_asarray instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_asarray->getData()); } else { var_export($res_asarray); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::asarray_chkfinite()\n";
    try {
        $res_asarray_chkfinite = np::asarray_chkfinite(1);
        if ($res_asarray_chkfinite instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_asarray_chkfinite->getData()); } else { var_export($res_asarray_chkfinite); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::ascontiguousarray()\n";
    try {
        $res_ascontiguousarray = np::ascontiguousarray(1);
        if ($res_ascontiguousarray instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_ascontiguousarray->getData()); } else { var_export($res_ascontiguousarray); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::asfortranarray()\n";
    try {
        $res_asfortranarray = np::asfortranarray(1);
        if ($res_asfortranarray instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_asfortranarray->getData()); } else { var_export($res_asfortranarray); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::asin()\n";
    try {
        $res_asin = np::asin(np::array([1,2]));
        if ($res_asin instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_asin->getData()); } else { var_export($res_asin); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::asinh()\n";
    try {
        $res_asinh = np::asinh(np::array([1,2]));
        if ($res_asinh instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_asinh->getData()); } else { var_export($res_asinh); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::asmatrix()\n";
    try {
        $res_asmatrix = np::asmatrix(1);
        if ($res_asmatrix instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_asmatrix->getData()); } else { var_export($res_asmatrix); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::astype()\n";
    try {
        $res_astype = np::astype(np::array([1,2]), 'float');
        if ($res_astype instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_astype->getData()); } else { var_export($res_astype); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::atan()\n";
    try {
        $res_atan = np::atan(np::array([1,2]));
        if ($res_atan instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_atan->getData()); } else { var_export($res_atan); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::atan2()\n";
    try {
        $res_atan2 = np::atan2(np::array([1,2]), np::array([1,2]));
        if ($res_atan2 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_atan2->getData()); } else { var_export($res_atan2); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::atanh()\n";
    try {
        $res_atanh = np::atanh(np::array([1,2]));
        if ($res_atanh instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_atanh->getData()); } else { var_export($res_atanh); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::atleast_1d()\n";
    try {
        $res_atleast_1d = np::atleast_1d(np::array([1,2]));
        if ($res_atleast_1d instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_atleast_1d->getData()); } else { var_export($res_atleast_1d); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::atleast_2d()\n";
    try {
        $res_atleast_2d = np::atleast_2d(np::array([1,2]));
        if ($res_atleast_2d instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_atleast_2d->getData()); } else { var_export($res_atleast_2d); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::atleast_3d()\n";
    try {
        $res_atleast_3d = np::atleast_3d(np::array([1,2]));
        if ($res_atleast_3d instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_atleast_3d->getData()); } else { var_export($res_atleast_3d); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::average()\n";
    try {
        $res_average = np::average(np::array([1,2]));
        if ($res_average instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_average->getData()); } else { var_export($res_average); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::bartlett()\n";
    try {
        $res_bartlett = np::bartlett(2);
        if ($res_bartlett instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_bartlett->getData()); } else { var_export($res_bartlett); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::base_repr()\n";
    try {
        $res_base_repr = np::base_repr(1);
        if ($res_base_repr instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_base_repr->getData()); } else { var_export($res_base_repr); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::bincount()\n";
    try {
        $res_bincount = np::bincount(np::array([1,2]));
        if ($res_bincount instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_bincount->getData()); } else { var_export($res_bincount); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::bitwise_and()\n";
    try {
        $res_bitwise_and = np::bitwise_and(np::array([1,2]), 1);
        if ($res_bitwise_and instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_bitwise_and->getData()); } else { var_export($res_bitwise_and); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::bitwise_count()\n";
    try {
        $res_bitwise_count = np::bitwise_count(np::array([1,2]));
        if ($res_bitwise_count instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_bitwise_count->getData()); } else { var_export($res_bitwise_count); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::bitwise_invert()\n";
    try {
        $res_bitwise_invert = np::bitwise_invert(np::array([1,2]));
        if ($res_bitwise_invert instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_bitwise_invert->getData()); } else { var_export($res_bitwise_invert); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::bitwise_left_shift()\n";
    try {
        $res_bitwise_left_shift = np::bitwise_left_shift(np::array([1,2]), 1);
        if ($res_bitwise_left_shift instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_bitwise_left_shift->getData()); } else { var_export($res_bitwise_left_shift); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::bitwise_not()\n";
    try {
        $res_bitwise_not = np::bitwise_not(np::array([1,2]));
        if ($res_bitwise_not instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_bitwise_not->getData()); } else { var_export($res_bitwise_not); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::bitwise_or()\n";
    try {
        $res_bitwise_or = np::bitwise_or(np::array([1,2]), 1);
        if ($res_bitwise_or instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_bitwise_or->getData()); } else { var_export($res_bitwise_or); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::bitwise_right_shift()\n";
    try {
        $res_bitwise_right_shift = np::bitwise_right_shift(np::array([1,2]), 1);
        if ($res_bitwise_right_shift instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_bitwise_right_shift->getData()); } else { var_export($res_bitwise_right_shift); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::bitwise_xor()\n";
    try {
        $res_bitwise_xor = np::bitwise_xor(np::array([1,2]), 1);
        if ($res_bitwise_xor instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_bitwise_xor->getData()); } else { var_export($res_bitwise_xor); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::blackman()\n";
    try {
        $res_blackman = np::blackman(2);
        if ($res_blackman instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_blackman->getData()); } else { var_export($res_blackman); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::block()\n";
    try {
        $res_block = np::block([np::array([1]), np::array([2])]);
        if ($res_block instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_block->getData()); } else { var_export($res_block); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::bool()\n";
    try {
        $res_bool = np::bool();
        if ($res_bool instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_bool->getData()); } else { var_export($res_bool); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::bool_()\n";
    try {
        $res_bool_ = np::bool_();
        if ($res_bool_ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_bool_->getData()); } else { var_export($res_bool_); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::broadcast()\n";
    try {
        $res_broadcast = np::broadcast(1);
        if ($res_broadcast instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_broadcast->getData()); } else { var_export($res_broadcast); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::broadcast_shapes()\n";
    try {
        $res_broadcast_shapes = np::broadcast_shapes(1);
        if ($res_broadcast_shapes instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_broadcast_shapes->getData()); } else { var_export($res_broadcast_shapes); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::busday_count()\n";
    try {
        $res_busday_count = np::busday_count(1);
        if ($res_busday_count instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_busday_count->getData()); } else { var_export($res_busday_count); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::busday_offset()\n";
    try {
        $res_busday_offset = np::busday_offset(1);
        if ($res_busday_offset instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_busday_offset->getData()); } else { var_export($res_busday_offset); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::busdaycalendar()\n";
    try {
        $res_busdaycalendar = np::busdaycalendar(1);
        if ($res_busdaycalendar instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_busdaycalendar->getData()); } else { var_export($res_busdaycalendar); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::byte()\n";
    try {
        $res_byte = np::byte();
        if ($res_byte instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_byte->getData()); } else { var_export($res_byte); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::bytes_()\n";
    try {
        $res_bytes_ = np::bytes_();
        if ($res_bytes_ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_bytes_->getData()); } else { var_export($res_bytes_); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::c_()\n";
    try {
        $res_c_ = np::c_(1);
        if ($res_c_ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_c_->getData()); } else { var_export($res_c_); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::can_cast()\n";
    try {
        $res_can_cast = np::can_cast(1, 1);
        if ($res_can_cast instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_can_cast->getData()); } else { var_export($res_can_cast); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::cbrt()\n";
    try {
        $res_cbrt = np::cbrt(np::array([1,2]));
        if ($res_cbrt instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_cbrt->getData()); } else { var_export($res_cbrt); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::cdouble()\n";
    try {
        $res_cdouble = np::cdouble();
        if ($res_cdouble instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_cdouble->getData()); } else { var_export($res_cdouble); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::ceil()\n";
    try {
        $res_ceil = np::ceil(np::array([1,2]));
        if ($res_ceil instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_ceil->getData()); } else { var_export($res_ceil); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::char()\n";
    try {
        $res_char = np::char(1);
        if ($res_char instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_char->getData()); } else { var_export($res_char); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::character()\n";
    try {
        $res_character = np::character(1);
        if ($res_character instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_character->getData()); } else { var_export($res_character); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::choose()\n";
    try {
        $res_choose = np::choose(np::array([0,1]), [np::array([1,2]), np::array([3,4])]);
        if ($res_choose instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_choose->getData()); } else { var_export($res_choose); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::clip()\n";
    try {
        $res_clip = np::clip(np::array([1,2]), 1, 1);
        if ($res_clip instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_clip->getData()); } else { var_export($res_clip); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::clongdouble()\n";
    try {
        $res_clongdouble = np::clongdouble();
        if ($res_clongdouble instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_clongdouble->getData()); } else { var_export($res_clongdouble); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::column_stack()\n";
    try {
        $res_column_stack = np::column_stack([np::array([1]), np::array([2])]);
        if ($res_column_stack instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_column_stack->getData()); } else { var_export($res_column_stack); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::complex128()\n";
    try {
        $res_complex128 = np::complex128();
        if ($res_complex128 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_complex128->getData()); } else { var_export($res_complex128); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::complex256()\n";
    try {
        $res_complex256 = np::complex256();
        if ($res_complex256 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_complex256->getData()); } else { var_export($res_complex256); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::complex64()\n";
    try {
        $res_complex64 = np::complex64();
        if ($res_complex64 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_complex64->getData()); } else { var_export($res_complex64); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::complexfloating()\n";
    try {
        $res_complexfloating = np::complexfloating();
        if ($res_complexfloating instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_complexfloating->getData()); } else { var_export($res_complexfloating); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::compress()\n";
    try {
        $res_compress = np::compress(np::array([1,2]), np::array([1,2]));
        if ($res_compress instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_compress->getData()); } else { var_export($res_compress); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::concat()\n";
    try {
        $res_concat = np::concat([np::array([1]), np::array([2])]);
        if ($res_concat instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_concat->getData()); } else { var_export($res_concat); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::concatenate()\n";
    try {
        $res_concatenate = np::concatenate([np::array([1]), np::array([2])]);
        if ($res_concatenate instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_concatenate->getData()); } else { var_export($res_concatenate); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::convolve()\n";
    try {
        $res_convolve = np::convolve(np::array([1,2]), np::array([1,2]));
        if ($res_convolve instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_convolve->getData()); } else { var_export($res_convolve); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::copy()\n";
    try {
        $res_copy = np::copy(np::array([1,2]));
        if ($res_copy instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_copy->getData()); } else { var_export($res_copy); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::copysign()\n";
    try {
        $res_copysign = np::copysign(np::array([1,2]), np::array([1,2]));
        if ($res_copysign instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_copysign->getData()); } else { var_export($res_copysign); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::core()\n";
    try {
        $res_core = np::core();
        if ($res_core instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_core->getData()); } else { var_export($res_core); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::corrcoef()\n";
    try {
        $res_corrcoef = np::corrcoef(np::array([1,2]));
        if ($res_corrcoef instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_corrcoef->getData()); } else { var_export($res_corrcoef); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::cos()\n";
    try {
        $res_cos = np::cos(np::array([1,2]));
        if ($res_cos instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_cos->getData()); } else { var_export($res_cos); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::cosh()\n";
    try {
        $res_cosh = np::cosh(np::array([1,2]));
        if ($res_cosh instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_cosh->getData()); } else { var_export($res_cosh); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::count_nonzero()\n";
    try {
        $res_count_nonzero = np::count_nonzero(np::array([1,2]));
        if ($res_count_nonzero instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_count_nonzero->getData()); } else { var_export($res_count_nonzero); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::cov()\n";
    try {
        $res_cov = np::cov(np::array([1,2]));
        if ($res_cov instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_cov->getData()); } else { var_export($res_cov); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::cross()\n";
    try {
        $res_cross = np::cross(np::array([1,2]), np::array([1,2]));
        if ($res_cross instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_cross->getData()); } else { var_export($res_cross); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::csingle()\n";
    try {
        $res_csingle = np::csingle();
        if ($res_csingle instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_csingle->getData()); } else { var_export($res_csingle); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::ctypeslib()\n";
    try {
        $res_ctypeslib = np::ctypeslib(1);
        if ($res_ctypeslib instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_ctypeslib->getData()); } else { var_export($res_ctypeslib); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::cumprod()\n";
    try {
        $res_cumprod = np::cumprod(np::array([1,2]));
        if ($res_cumprod instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_cumprod->getData()); } else { var_export($res_cumprod); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::cumsum()\n";
    try {
        $res_cumsum = np::cumsum(np::array([1,2]));
        if ($res_cumsum instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_cumsum->getData()); } else { var_export($res_cumsum); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::cumulative_prod()\n";
    try {
        $res_cumulative_prod = np::cumulative_prod(np::array([1,2]));
        if ($res_cumulative_prod instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_cumulative_prod->getData()); } else { var_export($res_cumulative_prod); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::cumulative_sum()\n";
    try {
        $res_cumulative_sum = np::cumulative_sum(np::array([1,2]));
        if ($res_cumulative_sum instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_cumulative_sum->getData()); } else { var_export($res_cumulative_sum); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::datetime64()\n";
    try {
        $res_datetime64 = np::datetime64(1);
        if ($res_datetime64 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_datetime64->getData()); } else { var_export($res_datetime64); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::datetime_as_string()\n";
    try {
        $res_datetime_as_string = np::datetime_as_string(1);
        if ($res_datetime_as_string instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_datetime_as_string->getData()); } else { var_export($res_datetime_as_string); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::datetime_data()\n";
    try {
        $res_datetime_data = np::datetime_data(1);
        if ($res_datetime_data instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_datetime_data->getData()); } else { var_export($res_datetime_data); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::degrees()\n";
    try {
        $res_degrees = np::degrees(np::array([1,2]));
        if ($res_degrees instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_degrees->getData()); } else { var_export($res_degrees); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::delete()\n";
    try {
        $res_delete = np::delete(np::array([1,2]), 1);
        if ($res_delete instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_delete->getData()); } else { var_export($res_delete); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::diag()\n";
    try {
        $res_diag = np::diag(np::array([1,2]));
        if ($res_diag instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_diag->getData()); } else { var_export($res_diag); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::diff()\n";
    try {
        $res_diff = np::diff(np::array([1,2]));
        if ($res_diff instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_diff->getData()); } else { var_export($res_diff); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::digitize()\n";
    try {
        $res_digitize = np::digitize(np::array([1,2]), np::array([1,2]));
        if ($res_digitize instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_digitize->getData()); } else { var_export($res_digitize); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::divide()\n";
    try {
        $res_divide = np::divide(np::array([1,2]), np::array([1,2]));
        if ($res_divide instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_divide->getData()); } else { var_export($res_divide); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::dot()\n";
    try {
        $res_dot = np::dot(1, 1);
        if ($res_dot instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_dot->getData()); } else { var_export($res_dot); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::double()\n";
    try {
        $res_double = np::double();
        if ($res_double instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_double->getData()); } else { var_export($res_double); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::dsplit()\n";
    try {
        $res_dsplit = np::dsplit(np::array([[[1,2],[3,4]],[[5,6],[7,8]]]), 2);
        if ($res_dsplit instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_dsplit->getData()); } else { var_export($res_dsplit); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::dstack()\n";
    try {
        $res_dstack = np::dstack([np::array([1]), np::array([2])]);
        if ($res_dstack instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_dstack->getData()); } else { var_export($res_dstack); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::dtypes()\n";
    try {
        $res_dtypes = np::dtypes();
        if ($res_dtypes instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_dtypes->getData()); } else { var_export($res_dtypes); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::e()\n";
    try {
        $res_e = np::e();
        if ($res_e instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_e->getData()); } else { var_export($res_e); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::ediff1d()\n";
    try {
        $res_ediff1d = np::ediff1d(np::array([1,2]));
        if ($res_ediff1d instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_ediff1d->getData()); } else { var_export($res_ediff1d); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::emath()\n";
    try {
        $res_emath = np::emath(1);
        if ($res_emath instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_emath->getData()); } else { var_export($res_emath); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::empty_like()\n";
    try {
        $res_empty_like = np::empty_like(np::array([1,2]));
        if ($res_empty_like instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_empty_like->getData()); } else { var_export($res_empty_like); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::errstate()\n";
    try {
        $res_errstate = np::errstate(1);
        if ($res_errstate instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_errstate->getData()); } else { var_export($res_errstate); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::euler_gamma()\n";
    try {
        $res_euler_gamma = np::euler_gamma();
        if ($res_euler_gamma instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_euler_gamma->getData()); } else { var_export($res_euler_gamma); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::exceptions()\n";
    try {
        $res_exceptions = np::exceptions();
        if ($res_exceptions instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_exceptions->getData()); } else { var_export($res_exceptions); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::exp()\n";
    try {
        $res_exp = np::exp(np::array([1,2]));
        if ($res_exp instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_exp->getData()); } else { var_export($res_exp); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::expand_dims()\n";
    try {
        $res_expand_dims = np::expand_dims(np::array([1,2]), 0);
        if ($res_expand_dims instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_expand_dims->getData()); } else { var_export($res_expand_dims); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::expm1()\n";
    try {
        $res_expm1 = np::expm1(np::array([1,2]));
        if ($res_expm1 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_expm1->getData()); } else { var_export($res_expm1); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::eye()\n";
    try {
        $res_eye = np::eye(2);
        if ($res_eye instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_eye->getData()); } else { var_export($res_eye); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::f2py()\n";
    try {
        $res_f2py = np::f2py(1);
        if ($res_f2py instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_f2py->getData()); } else { var_export($res_f2py); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::fabs()\n";
    try {
        $res_fabs = np::fabs(np::array([1,2]));
        if ($res_fabs instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_fabs->getData()); } else { var_export($res_fabs); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::fft()\n";
    try {
        $res_fft = np::fft(np::array([1,2]));
        if ($res_fft instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_fft->getData()); } else { var_export($res_fft); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::finfo()\n";
    try {
        $res_finfo = np::finfo('float');
        if ($res_finfo instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_finfo->getData()); } else { var_export($res_finfo); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::flatiter()\n";
    try {
        $res_flatiter = np::flatiter(np::array([1,2]));
        if ($res_flatiter instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_flatiter->getData()); } else { var_export($res_flatiter); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::flexible()\n";
    try {
        $res_flexible = np::flexible();
        if ($res_flexible instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_flexible->getData()); } else { var_export($res_flexible); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::flip()\n";
    try {
        $res_flip = np::flip(np::array([1,2]));
        if ($res_flip instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_flip->getData()); } else { var_export($res_flip); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::float128()\n";
    try {
        $res_float128 = np::float128();
        if ($res_float128 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_float128->getData()); } else { var_export($res_float128); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::float16()\n";
    try {
        $res_float16 = np::float16();
        if ($res_float16 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_float16->getData()); } else { var_export($res_float16); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::float32()\n";
    try {
        $res_float32 = np::float32();
        if ($res_float32 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_float32->getData()); } else { var_export($res_float32); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::float64()\n";
    try {
        $res_float64 = np::float64();
        if ($res_float64 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_float64->getData()); } else { var_export($res_float64); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::floating()\n";
    try {
        $res_floating = np::floating();
        if ($res_floating instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_floating->getData()); } else { var_export($res_floating); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::floor()\n";
    try {
        $res_floor = np::floor(np::array([1,2]));
        if ($res_floor instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_floor->getData()); } else { var_export($res_floor); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::fmod()\n";
    try {
        $res_fmod = np::fmod(np::array([1,2]), np::array([1,2]));
        if ($res_fmod instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_fmod->getData()); } else { var_export($res_fmod); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::format_float_positional()\n";
    try {
        $res_format_float_positional = np::format_float_positional(1);
        if ($res_format_float_positional instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_format_float_positional->getData()); } else { var_export($res_format_float_positional); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::format_float_scientific()\n";
    try {
        $res_format_float_scientific = np::format_float_scientific(1);
        if ($res_format_float_scientific instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_format_float_scientific->getData()); } else { var_export($res_format_float_scientific); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::from_dlpack()\n";
    try {
        $res_from_dlpack = np::from_dlpack(1);
        if ($res_from_dlpack instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_from_dlpack->getData()); } else { var_export($res_from_dlpack); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::frombuffer()\n";
    try {
        $res_frombuffer = np::frombuffer(1);
        if ($res_frombuffer instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_frombuffer->getData()); } else { var_export($res_frombuffer); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::fromfile()\n";
    try {
        $res_fromfile = np::fromfile('/tmp/none');
        if ($res_fromfile instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_fromfile->getData()); } else { var_export($res_fromfile); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::frompyfunc()\n";
    try {
        $res_frompyfunc = np::frompyfunc(function($x){return $x;}, 1, 1);
        if ($res_frompyfunc instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_frompyfunc->getData()); } else { var_export($res_frompyfunc); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::fromregex()\n";
    try {
        $res_fromregex = np::fromregex('/tmp/none', 1);
        if ($res_fromregex instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_fromregex->getData()); } else { var_export($res_fromregex); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::fromstring()\n";
    try {
        $res_fromstring = np::fromstring(1);
        if ($res_fromstring instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_fromstring->getData()); } else { var_export($res_fromstring); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::full()\n";
    try {
        $res_full = np::full([np::array([1]), np::array([2])], 1);
        if ($res_full instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_full->getData()); } else { var_export($res_full); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::full_like()\n";
    try {
        $res_full_like = np::full_like(np::array([1,2]), 1);
        if ($res_full_like instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_full_like->getData()); } else { var_export($res_full_like); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::gcd()\n";
    try {
        $res_gcd = np::gcd(np::array([1,2]), 1);
        if ($res_gcd instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_gcd->getData()); } else { var_export($res_gcd); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::generic()\n";
    try {
        $res_generic = np::generic();
        if ($res_generic instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_generic->getData()); } else { var_export($res_generic); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::genfromtxt()\n";
    try {
        $res_genfromtxt = np::genfromtxt('/tmp/none');
        if ($res_genfromtxt instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_genfromtxt->getData()); } else { var_export($res_genfromtxt); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::geomspace()\n";
    try {
        $res_geomspace = np::geomspace(1, 100);
        if ($res_geomspace instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_geomspace->getData()); } else { var_export($res_geomspace); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::get_include()\n";
    try {
        $res_get_include = np::get_include();
        if ($res_get_include instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_get_include->getData()); } else { var_export($res_get_include); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::get_printoptions()\n";
    try {
        $res_get_printoptions = np::get_printoptions();
        if ($res_get_printoptions instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_get_printoptions->getData()); } else { var_export($res_get_printoptions); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::getbufsize()\n";
    try {
        $res_getbufsize = np::getbufsize();
        if ($res_getbufsize instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_getbufsize->getData()); } else { var_export($res_getbufsize); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::geterr()\n";
    try {
        $res_geterr = np::geterr();
        if ($res_geterr instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_geterr->getData()); } else { var_export($res_geterr); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::geterrcall()\n";
    try {
        $res_geterrcall = np::geterrcall();
        if ($res_geterrcall instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_geterrcall->getData()); } else { var_export($res_geterrcall); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::gradient()\n";
    try {
        $res_gradient = np::gradient(np::array([1,2]));
        if ($res_gradient instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_gradient->getData()); } else { var_export($res_gradient); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::greater()\n";
    try {
        $res_greater = np::greater(np::array([1,2]), 1);
        if ($res_greater instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_greater->getData()); } else { var_export($res_greater); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::greater_equal()\n";
    try {
        $res_greater_equal = np::greater_equal(np::array([1,2]), 1);
        if ($res_greater_equal instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_greater_equal->getData()); } else { var_export($res_greater_equal); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::half()\n";
    try {
        $res_half = np::half();
        if ($res_half instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_half->getData()); } else { var_export($res_half); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::hamming()\n";
    try {
        $res_hamming = np::hamming(2);
        if ($res_hamming instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_hamming->getData()); } else { var_export($res_hamming); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::hanning()\n";
    try {
        $res_hanning = np::hanning(2);
        if ($res_hanning instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_hanning->getData()); } else { var_export($res_hanning); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::heaviside()\n";
    try {
        $res_heaviside = np::heaviside(np::array([1,2]), np::array([1,2]));
        if ($res_heaviside instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_heaviside->getData()); } else { var_export($res_heaviside); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::histogram()\n";
    try {
        $res_histogram = np::histogram(np::array([1,2]));
        if ($res_histogram instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_histogram->getData()); } else { var_export($res_histogram); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::histogram_bin_edges()\n";
    try {
        $res_histogram_bin_edges = np::histogram_bin_edges(np::array([1,2]));
        if ($res_histogram_bin_edges instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_histogram_bin_edges->getData()); } else { var_export($res_histogram_bin_edges); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::hsplit()\n";
    try {
        $res_hsplit = np::hsplit(np::array([1,2]), 1);
        if ($res_hsplit instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_hsplit->getData()); } else { var_export($res_hsplit); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::hstack()\n";
    try {
        $res_hstack = np::hstack([np::array([1]), np::array([2])]);
        if ($res_hstack instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_hstack->getData()); } else { var_export($res_hstack); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::hypot()\n";
    try {
        $res_hypot = np::hypot(np::array([1,2]), np::array([1,2]));
        if ($res_hypot instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_hypot->getData()); } else { var_export($res_hypot); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::identity()\n";
    try {
        $res_identity = np::identity(2);
        if ($res_identity instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_identity->getData()); } else { var_export($res_identity); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::iinfo()\n";
    try {
        $res_iinfo = np::iinfo('float');
        if ($res_iinfo instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_iinfo->getData()); } else { var_export($res_iinfo); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::index_exp()\n";
    try {
        $res_index_exp = np::index_exp();
        if ($res_index_exp instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_index_exp->getData()); } else { var_export($res_index_exp); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::inexact()\n";
    try {
        $res_inexact = np::inexact();
        if ($res_inexact instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_inexact->getData()); } else { var_export($res_inexact); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::inf()\n";
    try {
        $res_inf = np::inf();
        if ($res_inf instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_inf->getData()); } else { var_export($res_inf); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::info()\n";
    try {
        $res_info = np::info();
        if ($res_info instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_info->getData()); } else { var_export($res_info); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::inner()\n";
    try {
        $res_inner = np::inner(np::array([1,2]), np::array([1,2]));
        if ($res_inner instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_inner->getData()); } else { var_export($res_inner); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::insert()\n";
    try {
        $res_insert = np::insert(np::array([1,2]), 1, 1);
        if ($res_insert instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_insert->getData()); } else { var_export($res_insert); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::int16()\n";
    try {
        $res_int16 = np::int16();
        if ($res_int16 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_int16->getData()); } else { var_export($res_int16); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::int32()\n";
    try {
        $res_int32 = np::int32();
        if ($res_int32 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_int32->getData()); } else { var_export($res_int32); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::int64()\n";
    try {
        $res_int64 = np::int64();
        if ($res_int64 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_int64->getData()); } else { var_export($res_int64); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::int8()\n";
    try {
        $res_int8 = np::int8();
        if ($res_int8 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_int8->getData()); } else { var_export($res_int8); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::int_()\n";
    try {
        $res_int_ = np::int_();
        if ($res_int_ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_int_->getData()); } else { var_export($res_int_); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::intc()\n";
    try {
        $res_intc = np::intc();
        if ($res_intc instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_intc->getData()); } else { var_export($res_intc); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::integer()\n";
    try {
        $res_integer = np::integer();
        if ($res_integer instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_integer->getData()); } else { var_export($res_integer); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::interp()\n";
    try {
        $res_interp = np::interp(np::array([1,2]), np::array([1,2]), np::array([1,2]));
        if ($res_interp instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_interp->getData()); } else { var_export($res_interp); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::intersect1d()\n";
    try {
        $res_intersect1d = np::intersect1d(np::array([1,2]), np::array([1,2]));
        if ($res_intersect1d instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_intersect1d->getData()); } else { var_export($res_intersect1d); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::intp()\n";
    try {
        $res_intp = np::intp();
        if ($res_intp instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_intp->getData()); } else { var_export($res_intp); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::invert()\n";
    try {
        $res_invert = np::invert(np::array([1,2]));
        if ($res_invert instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_invert->getData()); } else { var_export($res_invert); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::is_busday()\n";
    try {
        $res_is_busday = np::is_busday(1);
        if ($res_is_busday instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_is_busday->getData()); } else { var_export($res_is_busday); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::isclose()\n";
    try {
        $res_isclose = np::isclose(np::array([1,2]), np::array([1,2]));
        if ($res_isclose instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_isclose->getData()); } else { var_export($res_isclose); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::iscomplex()\n";
    try {
        $res_iscomplex = np::iscomplex(np::array([1,2]));
        if ($res_iscomplex instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_iscomplex->getData()); } else { var_export($res_iscomplex); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::iscomplexobj()\n";
    try {
        $res_iscomplexobj = np::iscomplexobj(1);
        if ($res_iscomplexobj instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_iscomplexobj->getData()); } else { var_export($res_iscomplexobj); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::isfinite()\n";
    try {
        $res_isfinite = np::isfinite(np::array([1,2]));
        if ($res_isfinite instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_isfinite->getData()); } else { var_export($res_isfinite); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::isfortran()\n";
    try {
        $res_isfortran = np::isfortran(1);
        if ($res_isfortran instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_isfortran->getData()); } else { var_export($res_isfortran); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::isin()\n";
    try {
        $res_isin = np::isin(np::array([1,2]), np::array([1,2]));
        if ($res_isin instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_isin->getData()); } else { var_export($res_isin); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::isinf()\n";
    try {
        $res_isinf = np::isinf(np::array([1,2]));
        if ($res_isinf instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_isinf->getData()); } else { var_export($res_isinf); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::isnan()\n";
    try {
        $res_isnan = np::isnan(np::array([1,2]));
        if ($res_isnan instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_isnan->getData()); } else { var_export($res_isnan); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::isnat()\n";
    try {
        $res_isnat = np::isnat(1);
        if ($res_isnat instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_isnat->getData()); } else { var_export($res_isnat); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::isneginf()\n";
    try {
        $res_isneginf = np::isneginf(np::array([1,2]));
        if ($res_isneginf instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_isneginf->getData()); } else { var_export($res_isneginf); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::isposinf()\n";
    try {
        $res_isposinf = np::isposinf(np::array([1,2]));
        if ($res_isposinf instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_isposinf->getData()); } else { var_export($res_isposinf); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::isreal()\n";
    try {
        $res_isreal = np::isreal(np::array([1,2]));
        if ($res_isreal instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_isreal->getData()); } else { var_export($res_isreal); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::isrealobj()\n";
    try {
        $res_isrealobj = np::isrealobj(1);
        if ($res_isrealobj instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_isrealobj->getData()); } else { var_export($res_isrealobj); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::isscalar()\n";
    try {
        $res_isscalar = np::isscalar(2);
        if ($res_isscalar instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_isscalar->getData()); } else { var_export($res_isscalar); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::iterable()\n";
    try {
        $res_iterable = np::iterable(1);
        if ($res_iterable instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_iterable->getData()); } else { var_export($res_iterable); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::kaiser()\n";
    try {
        $res_kaiser = np::kaiser(2);
        if ($res_kaiser instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_kaiser->getData()); } else { var_export($res_kaiser); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::kron()\n";
    try {
        $res_kron = np::kron(np::array([[1,2],[3,4]]), np::array([[0,5],[6,7]]));
        if ($res_kron instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_kron->getData()); } else { var_export($res_kron); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::lcm()\n";
    try {
        $res_lcm = np::lcm(np::array([1,2]), 1);
        if ($res_lcm instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_lcm->getData()); } else { var_export($res_lcm); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::left_shift()\n";
    try {
        $res_left_shift = np::left_shift(np::array([1,2]), 1);
        if ($res_left_shift instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_left_shift->getData()); } else { var_export($res_left_shift); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::less()\n";
    try {
        $res_less = np::less(np::array([1,2]), 1);
        if ($res_less instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_less->getData()); } else { var_export($res_less); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::less_equal()\n";
    try {
        $res_less_equal = np::less_equal(np::array([1,2]), 1);
        if ($res_less_equal instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_less_equal->getData()); } else { var_export($res_less_equal); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::lib()\n";
    try {
        $res_lib = np::lib();
        if ($res_lib instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_lib->getData()); } else { var_export($res_lib); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::linspace()\n";
    try {
        $res_linspace = np::linspace(0, 1);
        if ($res_linspace instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_linspace->getData()); } else { var_export($res_linspace); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::little_endian()\n";
    try {
        $res_little_endian = np::little_endian();
        if ($res_little_endian instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_little_endian->getData()); } else { var_export($res_little_endian); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::load()\n";
    try {
        $res_load = np::load('/tmp/none');
        if ($res_load instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_load->getData()); } else { var_export($res_load); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::loadtxt()\n";
    try {
        $res_loadtxt = np::loadtxt(1);
        if ($res_loadtxt instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_loadtxt->getData()); } else { var_export($res_loadtxt); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::log()\n";
    try {
        $res_log = np::log(np::array([1,2]));
        if ($res_log instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_log->getData()); } else { var_export($res_log); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::log10()\n";
    try {
        $res_log10 = np::log10(np::array([1,2]));
        if ($res_log10 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_log10->getData()); } else { var_export($res_log10); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::log2()\n";
    try {
        $res_log2 = np::log2(np::array([1,2]));
        if ($res_log2 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_log2->getData()); } else { var_export($res_log2); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::logical_and()\n";
    try {
        $res_logical_and = np::logical_and(np::array([1,2]), np::array([1,2]));
        if ($res_logical_and instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_logical_and->getData()); } else { var_export($res_logical_and); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::logical_not()\n";
    try {
        $res_logical_not = np::logical_not(np::array([1,2]));
        if ($res_logical_not instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_logical_not->getData()); } else { var_export($res_logical_not); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::logical_or()\n";
    try {
        $res_logical_or = np::logical_or(np::array([1,2]), np::array([1,2]));
        if ($res_logical_or instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_logical_or->getData()); } else { var_export($res_logical_or); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::logspace()\n";
    try {
        $res_logspace = np::logspace(0, 1);
        if ($res_logspace instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_logspace->getData()); } else { var_export($res_logspace); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::long()\n";
    try {
        $res_long = np::long();
        if ($res_long instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_long->getData()); } else { var_export($res_long); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::longdouble()\n";
    try {
        $res_longdouble = np::longdouble();
        if ($res_longdouble instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_longdouble->getData()); } else { var_export($res_longdouble); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::longlong()\n";
    try {
        $res_longlong = np::longlong();
        if ($res_longlong instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_longlong->getData()); } else { var_export($res_longlong); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::ma()\n";
    try {
        $res_ma = np::ma();
        if ($res_ma instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_ma->getData()); } else { var_export($res_ma); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::matmul()\n";
    try {
        $res_matmul = np::matmul(np::array([[1,2],[3,4]]), np::array([[5,6],[7,8]]));
        if ($res_matmul instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_matmul->getData()); } else { var_export($res_matmul); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::matrix()\n";
    try {
        $res_matrix = np::matrix(1);
        if ($res_matrix instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_matrix->getData()); } else { var_export($res_matrix); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::matvec()\n";
    try {
        $res_matvec = np::matvec(np::array([[1,2],[3,4]]), np::array([5,6]));
        if ($res_matvec instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_matvec->getData()); } else { var_export($res_matvec); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::max()\n";
    try {
        $res_max = np::max(np::array([1,2]));
        if ($res_max instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_max->getData()); } else { var_export($res_max); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::maximum()\n";
    try {
        $res_maximum = np::maximum(np::array([1,2]), np::array([1,2]));
        if ($res_maximum instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_maximum->getData()); } else { var_export($res_maximum); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::may_share_memory()\n";
    try {
        $res_may_share_memory = np::may_share_memory(np::array([1,2]), np::array([1,2]));
        if ($res_may_share_memory instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_may_share_memory->getData()); } else { var_export($res_may_share_memory); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::mean()\n";
    try {
        $res_mean = np::mean(np::array([1,2]));
        if ($res_mean instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_mean->getData()); } else { var_export($res_mean); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::median()\n";
    try {
        $res_median = np::median(np::array([1,2]));
        if ($res_median instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_median->getData()); } else { var_export($res_median); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::memmap()\n";
    try {
        $res_memmap = np::memmap('/tmp/none');
        if ($res_memmap instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_memmap->getData()); } else { var_export($res_memmap); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::min()\n";
    try {
        $res_min = np::min(np::array([1,2]));
        if ($res_min instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_min->getData()); } else { var_export($res_min); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::minimum()\n";
    try {
        $res_minimum = np::minimum(np::array([1,2]), np::array([1,2]));
        if ($res_minimum instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_minimum->getData()); } else { var_export($res_minimum); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::multiply()\n";
    try {
        $res_multiply = np::multiply(np::array([1,2]), np::array([1,2]));
        if ($res_multiply instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_multiply->getData()); } else { var_export($res_multiply); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::nan()\n";
    try {
        $res_nan = np::nan();
        if ($res_nan instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_nan->getData()); } else { var_export($res_nan); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::nan_to_num()\n";
    try {
        $res_nan_to_num = np::nan_to_num(np::array([1,2]));
        if ($res_nan_to_num instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_nan_to_num->getData()); } else { var_export($res_nan_to_num); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::nancumsum()\n";
    try {
        $res_nancumsum = np::nancumsum(np::array([1,2]));
        if ($res_nancumsum instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_nancumsum->getData()); } else { var_export($res_nancumsum); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::nanmax()\n";
    try {
        $res_nanmax = np::nanmax(np::array([1,2]));
        if ($res_nanmax instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_nanmax->getData()); } else { var_export($res_nanmax); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::nanmean()\n";
    try {
        $res_nanmean = np::nanmean(np::array([1,2]));
        if ($res_nanmean instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_nanmean->getData()); } else { var_export($res_nanmean); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::nanmedian()\n";
    try {
        $res_nanmedian = np::nanmedian(np::array([1,2]));
        if ($res_nanmedian instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_nanmedian->getData()); } else { var_export($res_nanmedian); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::nanmin()\n";
    try {
        $res_nanmin = np::nanmin(np::array([1,2]));
        if ($res_nanmin instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_nanmin->getData()); } else { var_export($res_nanmin); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::nanstd()\n";
    try {
        $res_nanstd = np::nanstd(np::array([1,2]));
        if ($res_nanstd instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_nanstd->getData()); } else { var_export($res_nanstd); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::nansum()\n";
    try {
        $res_nansum = np::nansum(np::array([1,2]));
        if ($res_nansum instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_nansum->getData()); } else { var_export($res_nansum); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::nanvar()\n";
    try {
        $res_nanvar = np::nanvar(np::array([1,2]));
        if ($res_nanvar instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_nanvar->getData()); } else { var_export($res_nanvar); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::ndarray()\n";
    try {
        $res_ndarray = np::ndarray(1);
        if ($res_ndarray instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_ndarray->getData()); } else { var_export($res_ndarray); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::ndenumerate()\n";
    try {
        $res_ndenumerate = np::ndenumerate(np::array([1,2]));
        if ($res_ndenumerate instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_ndenumerate->getData()); } else { var_export($res_ndenumerate); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::ndindex()\n";
    try {
        $res_ndindex = np::ndindex(1);
        if ($res_ndindex instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_ndindex->getData()); } else { var_export($res_ndindex); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::nditer()\n";
    try {
        $res_nditer = np::nditer(np::array([1,2]));
        if ($res_nditer instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_nditer->getData()); } else { var_export($res_nditer); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::negative()\n";
    try {
        $res_negative = np::negative(np::array([1,2]));
        if ($res_negative instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_negative->getData()); } else { var_export($res_negative); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::nested_iters()\n";
    try {
        $res_nested_iters = np::nested_iters(1);
        if ($res_nested_iters instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_nested_iters->getData()); } else { var_export($res_nested_iters); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::newaxis()\n";
    try {
        $res_newaxis = np::newaxis();
        if ($res_newaxis instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_newaxis->getData()); } else { var_export($res_newaxis); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::nonzero()\n";
    try {
        $res_nonzero = np::nonzero(np::array([1,2]));
        if ($res_nonzero instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_nonzero->getData()); } else { var_export($res_nonzero); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::not_equal()\n";
    try {
        $res_not_equal = np::not_equal(np::array([1,2]), 1);
        if ($res_not_equal instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_not_equal->getData()); } else { var_export($res_not_equal); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::number()\n";
    try {
        $res_number = np::number();
        if ($res_number instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_number->getData()); } else { var_export($res_number); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::object_()\n";
    try {
        $res_object_ = np::object_();
        if ($res_object_ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_object_->getData()); } else { var_export($res_object_); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::ones()\n";
    try {
        $res_ones = np::ones([np::array([1]), np::array([2])]);
        if ($res_ones instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_ones->getData()); } else { var_export($res_ones); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::ones_like()\n";
    try {
        $res_ones_like = np::ones_like(np::array([1,2]));
        if ($res_ones_like instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_ones_like->getData()); } else { var_export($res_ones_like); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::outer()\n";
    try {
        $res_outer = np::outer(np::array([1,2]), np::array([1,2]));
        if ($res_outer instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_outer->getData()); } else { var_export($res_outer); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::pad()\n";
    try {
        $res_pad = np::pad(np::array([1,2]), 1);
        if ($res_pad instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_pad->getData()); } else { var_export($res_pad); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::partition()\n";
    try {
        $res_partition = np::partition(np::array([1,2]), 1);
        if ($res_partition instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_partition->getData()); } else { var_export($res_partition); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::percentile()\n";
    try {
        $res_percentile = np::percentile(np::array([1,2]), 0.5);
        if ($res_percentile instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_percentile->getData()); } else { var_export($res_percentile); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::permute_dims()\n";
    try {
        $res_permute_dims = np::permute_dims(np::array([1,2]), [np::array([1]), np::array([2])]);
        if ($res_permute_dims instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_permute_dims->getData()); } else { var_export($res_permute_dims); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::pi()\n";
    try {
        $res_pi = np::pi();
        if ($res_pi instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_pi->getData()); } else { var_export($res_pi); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::piecewise()\n";
    try {
        $res_piecewise = np::piecewise(np::array([1,2]), [np::array([1]), np::array([2])], [np::array([1]), np::array([2])]);
        if ($res_piecewise instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_piecewise->getData()); } else { var_export($res_piecewise); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::poly()\n";
    try {
        $res_poly = np::poly(1);
        if ($res_poly instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_poly->getData()); } else { var_export($res_poly); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::poly1d()\n";
    try {
        $res_poly1d = np::poly1d(1);
        if ($res_poly1d instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_poly1d->getData()); } else { var_export($res_poly1d); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::polyadd()\n";
    try {
        $res_polyadd = np::polyadd(1, 0.5);
        if ($res_polyadd instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_polyadd->getData()); } else { var_export($res_polyadd); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::polyder()\n";
    try {
        $res_polyder = np::polyder(1);
        if ($res_polyder instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_polyder->getData()); } else { var_export($res_polyder); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::polydiv()\n";
    try {
        $res_polydiv = np::polydiv(1, 0.5);
        if ($res_polydiv instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_polydiv->getData()); } else { var_export($res_polydiv); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::polyfit()\n";
    try {
        $res_polyfit = np::polyfit(np::array([1,2]), np::array([1,2]), 1);
        if ($res_polyfit instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_polyfit->getData()); } else { var_export($res_polyfit); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::polyint()\n";
    try {
        $res_polyint = np::polyint(1);
        if ($res_polyint instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_polyint->getData()); } else { var_export($res_polyint); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::polymul()\n";
    try {
        $res_polymul = np::polymul(1, 0.5);
        if ($res_polymul instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_polymul->getData()); } else { var_export($res_polymul); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::polynomial()\n";
    try {
        $res_polynomial = np::polynomial();
        if ($res_polynomial instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_polynomial->getData()); } else { var_export($res_polynomial); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::polysub()\n";
    try {
        $res_polysub = np::polysub(1, 0.5);
        if ($res_polysub instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_polysub->getData()); } else { var_export($res_polysub); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::polyval()\n";
    try {
        $res_polyval = np::polyval(1, 1);
        if ($res_polyval instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_polyval->getData()); } else { var_export($res_polyval); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::positive()\n";
    try {
        $res_positive = np::positive(np::array([1,2]));
        if ($res_positive instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_positive->getData()); } else { var_export($res_positive); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::pow()\n";
    try {
        $res_pow = np::pow(np::array([1,2]), 1);
        if ($res_pow instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_pow->getData()); } else { var_export($res_pow); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::power()\n";
    try {
        $res_power = np::power(np::array([1,2]), 1);
        if ($res_power instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_power->getData()); } else { var_export($res_power); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::printoptions()\n";
    try {
        $res_printoptions = np::printoptions(1);
        if ($res_printoptions instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_printoptions->getData()); } else { var_export($res_printoptions); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::prod()\n";
    try {
        $res_prod = np::prod(np::array([1,2]));
        if ($res_prod instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_prod->getData()); } else { var_export($res_prod); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::ptp()\n";
    try {
        $res_ptp = np::ptp(np::array([1,2]));
        if ($res_ptp instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_ptp->getData()); } else { var_export($res_ptp); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::putmask()\n";
    try {
    $ref_putmask = np::array([1,2]);
        $res_putmask = np::putmask($ref_putmask, np::array([1,2]), 1);
        if ($res_putmask instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_putmask->getData()); } else { var_export($res_putmask); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::quantile()\n";
    try {
        $res_quantile = np::quantile(np::array([1,2]), 0.5);
        if ($res_quantile instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_quantile->getData()); } else { var_export($res_quantile); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::r_()\n";
    try {
        $res_r_ = np::r_(1);
        if ($res_r_ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_r_->getData()); } else { var_export($res_r_); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::radians()\n";
    try {
        $res_radians = np::radians(np::array([1,2]));
        if ($res_radians instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_radians->getData()); } else { var_export($res_radians); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::ravel()\n";
    try {
        $res_ravel = np::ravel(np::array([1,2]));
        if ($res_ravel instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_ravel->getData()); } else { var_export($res_ravel); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::real_if_close()\n";
    try {
        $res_real_if_close = np::real_if_close(np::array([1,2]));
        if ($res_real_if_close instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_real_if_close->getData()); } else { var_export($res_real_if_close); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::rec()\n";
    try {
        $res_rec = np::rec(1);
        if ($res_rec instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_rec->getData()); } else { var_export($res_rec); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::recarray()\n";
    try {
        $res_recarray = np::recarray(1);
        if ($res_recarray instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_recarray->getData()); } else { var_export($res_recarray); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::reciprocal()\n";
    try {
        $res_reciprocal = np::reciprocal(np::array([1,2]));
        if ($res_reciprocal instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_reciprocal->getData()); } else { var_export($res_reciprocal); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::record()\n";
    try {
        $res_record = np::record(1);
        if ($res_record instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_record->getData()); } else { var_export($res_record); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::repeat()\n";
    try {
        $res_repeat = np::repeat(np::array([1,2]), 1);
        if ($res_repeat instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_repeat->getData()); } else { var_export($res_repeat); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::require()\n";
    try {
        $res_require = np::require(1);
        if ($res_require instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_require->getData()); } else { var_export($res_require); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::reshape()\n";
    try {
        $res_reshape = np::reshape(np::array([1,2]), [np::array([1]), np::array([2])]);
        if ($res_reshape instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_reshape->getData()); } else { var_export($res_reshape); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::right_shift()\n";
    try {
        $res_right_shift = np::right_shift(np::array([1,2]), 1);
        if ($res_right_shift instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_right_shift->getData()); } else { var_export($res_right_shift); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::roll()\n";
    try {
        $res_roll = np::roll(np::array([1,2]), 1);
        if ($res_roll instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_roll->getData()); } else { var_export($res_roll); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::roots()\n";
    try {
        $res_roots = np::roots(np::array([1, 0, -1]));
        if ($res_roots instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_roots->getData()); } else { var_export($res_roots); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::round()\n";
    try {
        $res_round = np::round(np::array([1,2]));
        if ($res_round instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_round->getData()); } else { var_export($res_round); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::s_()\n";
    try {
        $res_s_ = np::s_(1);
        if ($res_s_ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_s_->getData()); } else { var_export($res_s_); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::save()\n";
    try {
        $res_save = np::save('/tmp/none', np::array([1,2]));
        if ($res_save instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_save->getData()); } else { var_export($res_save); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::savetxt()\n";
    try {
        $res_savetxt = np::savetxt(1, np::array([1,2]));
        if ($res_savetxt instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_savetxt->getData()); } else { var_export($res_savetxt); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::savez()\n";
    try {
        $res_savez = np::savez('/tmp/none', 1);
        if ($res_savez instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_savez->getData()); } else { var_export($res_savez); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::savez_compressed()\n";
    try {
        $res_savez_compressed = np::savez_compressed('/tmp/none', 1);
        if ($res_savez_compressed instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_savez_compressed->getData()); } else { var_export($res_savez_compressed); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::sctypeDict()\n";
    try {
        $res_sctypeDict = np::sctypeDict();
        if ($res_sctypeDict instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_sctypeDict->getData()); } else { var_export($res_sctypeDict); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::searchsorted()\n";
    try {
        $res_searchsorted = np::searchsorted(np::array([1,2]), 1);
        if ($res_searchsorted instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_searchsorted->getData()); } else { var_export($res_searchsorted); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::select()\n";
    try {
        $res_select = np::select([np::array([1]), np::array([2])], [np::array([1]), np::array([2])]);
        if ($res_select instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_select->getData()); } else { var_export($res_select); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::set_printoptions()\n";
    try {
        $res_set_printoptions = np::set_printoptions(1);
        if ($res_set_printoptions instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_set_printoptions->getData()); } else { var_export($res_set_printoptions); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::setbufsize()\n";
    try {
        $res_setbufsize = np::setbufsize(1);
        if ($res_setbufsize instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_setbufsize->getData()); } else { var_export($res_setbufsize); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::setdiff1d()\n";
    try {
        $res_setdiff1d = np::setdiff1d(np::array([1,2]), np::array([1,2]));
        if ($res_setdiff1d instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_setdiff1d->getData()); } else { var_export($res_setdiff1d); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::seterr()\n";
    try {
        $res_seterr = np::seterr(1);
        if ($res_seterr instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_seterr->getData()); } else { var_export($res_seterr); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::seterrcall()\n";
    try {
        $res_seterrcall = np::seterrcall(1);
        if ($res_seterrcall instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_seterrcall->getData()); } else { var_export($res_seterrcall); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::setxor1d()\n";
    try {
        $res_setxor1d = np::setxor1d(np::array([1,2]), np::array([1,2]));
        if ($res_setxor1d instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_setxor1d->getData()); } else { var_export($res_setxor1d); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::shares_memory()\n";
    try {
        $res_shares_memory = np::shares_memory(np::array([1,2]), np::array([1,2]));
        if ($res_shares_memory instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_shares_memory->getData()); } else { var_export($res_shares_memory); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::short()\n";
    try {
        $res_short = np::short();
        if ($res_short instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_short->getData()); } else { var_export($res_short); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::show_config()\n";
    try {
        $res_show_config = np::show_config();
        if ($res_show_config instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_show_config->getData()); } else { var_export($res_show_config); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::show_runtime()\n";
    try {
        $res_show_runtime = np::show_runtime();
        if ($res_show_runtime instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_show_runtime->getData()); } else { var_export($res_show_runtime); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::sign()\n";
    try {
        $res_sign = np::sign(np::array([1,2]));
        if ($res_sign instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_sign->getData()); } else { var_export($res_sign); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::signedinteger()\n";
    try {
        $res_signedinteger = np::signedinteger();
        if ($res_signedinteger instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_signedinteger->getData()); } else { var_export($res_signedinteger); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::sin()\n";
    try {
        $res_sin = np::sin(np::array([1,2]));
        if ($res_sin instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_sin->getData()); } else { var_export($res_sin); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::sinc()\n";
    try {
        $res_sinc = np::sinc(np::array([1,2]));
        if ($res_sinc instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_sinc->getData()); } else { var_export($res_sinc); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::single()\n";
    try {
        $res_single = np::single();
        if ($res_single instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_single->getData()); } else { var_export($res_single); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::sinh()\n";
    try {
        $res_sinh = np::sinh(np::array([1,2]));
        if ($res_sinh instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_sinh->getData()); } else { var_export($res_sinh); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::split()\n";
    try {
        $res_split = np::split(np::array([1,2]), 1);
        if ($res_split instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_split->getData()); } else { var_export($res_split); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::sqrt()\n";
    try {
        $res_sqrt = np::sqrt(np::array([1,2]));
        if ($res_sqrt instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_sqrt->getData()); } else { var_export($res_sqrt); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::square()\n";
    try {
        $res_square = np::square(np::array([1,2]));
        if ($res_square instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_square->getData()); } else { var_export($res_square); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::squeeze()\n";
    try {
        $res_squeeze = np::squeeze(np::array([1,2]));
        if ($res_squeeze instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_squeeze->getData()); } else { var_export($res_squeeze); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::stack()\n";
    try {
        $res_stack = np::stack([np::array([1]), np::array([2])]);
        if ($res_stack instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_stack->getData()); } else { var_export($res_stack); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::std()\n";
    try {
        $res_std = np::std(np::array([1,2]));
        if ($res_std instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_std->getData()); } else { var_export($res_std); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::str_()\n";
    try {
        $res_str_ = np::str_();
        if ($res_str_ instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_str_->getData()); } else { var_export($res_str_); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::strings()\n";
    try {
        $res_strings = np::strings();
        if ($res_strings instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_strings->getData()); } else { var_export($res_strings); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::subtract()\n";
    try {
        $res_subtract = np::subtract(np::array([1,2]), np::array([1,2]));
        if ($res_subtract instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_subtract->getData()); } else { var_export($res_subtract); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::sum()\n";
    try {
        $res_sum = np::sum(np::array([1,2]));
        if ($res_sum instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_sum->getData()); } else { var_export($res_sum); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::take()\n";
    try {
        $res_take = np::take(np::array([1,2]), 1);
        if ($res_take instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_take->getData()); } else { var_export($res_take); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::tan()\n";
    try {
        $res_tan = np::tan(np::array([1,2]));
        if ($res_tan instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_tan->getData()); } else { var_export($res_tan); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::tanh()\n";
    try {
        $res_tanh = np::tanh(np::array([1,2]));
        if ($res_tanh instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_tanh->getData()); } else { var_export($res_tanh); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::test()\n";
    try {
        $res_test = np::test();
        if ($res_test instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_test->getData()); } else { var_export($res_test); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::testing()\n";
    try {
        $res_testing = np::testing();
        if ($res_testing instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_testing->getData()); } else { var_export($res_testing); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::tile()\n";
    try {
        $res_tile = np::tile(np::array([1,2]), 1);
        if ($res_tile instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_tile->getData()); } else { var_export($res_tile); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::timedelta64()\n";
    try {
        $res_timedelta64 = np::timedelta64(1);
        if ($res_timedelta64 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_timedelta64->getData()); } else { var_export($res_timedelta64); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::trace()\n";
    try {
        $res_trace = np::trace(np::array([[1,2],[3,4]]));
        if ($res_trace instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_trace->getData()); } else { var_export($res_trace); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::transpose()\n";
    try {
        $res_transpose = np::transpose(np::array([1,2]));
        if ($res_transpose instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_transpose->getData()); } else { var_export($res_transpose); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::trapezoid()\n";
    try {
        $res_trapezoid = np::trapezoid(np::array([1,2]));
        if ($res_trapezoid instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_trapezoid->getData()); } else { var_export($res_trapezoid); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::tri()\n";
    try {
        $res_tri = np::tri(2);
        if ($res_tri instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_tri->getData()); } else { var_export($res_tri); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::trim_zeros()\n";
    try {
        $res_trim_zeros = np::trim_zeros(np::array([1,2]));
        if ($res_trim_zeros instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_trim_zeros->getData()); } else { var_export($res_trim_zeros); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::triu()\n";
    try {
        $res_triu = np::triu(np::array([[1,2],[3,4]]));
        if ($res_triu instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_triu->getData()); } else { var_export($res_triu); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::true_divide()\n";
    try {
        $res_true_divide = np::true_divide(np::array([1,2]), np::array([1,2]));
        if ($res_true_divide instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_true_divide->getData()); } else { var_export($res_true_divide); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::typecodes()\n";
    try {
        $res_typecodes = np::typecodes();
        if ($res_typecodes instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_typecodes->getData()); } else { var_export($res_typecodes); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::typing()\n";
    try {
        $res_typing = np::typing();
        if ($res_typing instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_typing->getData()); } else { var_export($res_typing); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::ubyte()\n";
    try {
        $res_ubyte = np::ubyte();
        if ($res_ubyte instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_ubyte->getData()); } else { var_export($res_ubyte); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::ufunc()\n";
    try {
        $res_ufunc = np::ufunc();
        if ($res_ufunc instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_ufunc->getData()); } else { var_export($res_ufunc); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::uint()\n";
    try {
        $res_uint = np::uint();
        if ($res_uint instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_uint->getData()); } else { var_export($res_uint); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::uint16()\n";
    try {
        $res_uint16 = np::uint16();
        if ($res_uint16 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_uint16->getData()); } else { var_export($res_uint16); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::uint32()\n";
    try {
        $res_uint32 = np::uint32();
        if ($res_uint32 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_uint32->getData()); } else { var_export($res_uint32); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::uint64()\n";
    try {
        $res_uint64 = np::uint64();
        if ($res_uint64 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_uint64->getData()); } else { var_export($res_uint64); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::uint8()\n";
    try {
        $res_uint8 = np::uint8();
        if ($res_uint8 instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_uint8->getData()); } else { var_export($res_uint8); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::uintc()\n";
    try {
        $res_uintc = np::uintc();
        if ($res_uintc instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_uintc->getData()); } else { var_export($res_uintc); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::uintp()\n";
    try {
        $res_uintp = np::uintp();
        if ($res_uintp instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_uintp->getData()); } else { var_export($res_uintp); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::ulong()\n";
    try {
        $res_ulong = np::ulong();
        if ($res_ulong instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_ulong->getData()); } else { var_export($res_ulong); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::ulonglong()\n";
    try {
        $res_ulonglong = np::ulonglong();
        if ($res_ulonglong instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_ulonglong->getData()); } else { var_export($res_ulonglong); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::union1d()\n";
    try {
        $res_union1d = np::union1d(np::array([1,2]), np::array([1,2]));
        if ($res_union1d instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_union1d->getData()); } else { var_export($res_union1d); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::unique_all()\n";
    try {
        $res_unique_all = np::unique_all(np::array([1,2]));
        if ($res_unique_all instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_unique_all->getData()); } else { var_export($res_unique_all); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::unique_counts()\n";
    try {
        $res_unique_counts = np::unique_counts(np::array([1,2]));
        if ($res_unique_counts instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_unique_counts->getData()); } else { var_export($res_unique_counts); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::unique_inverse()\n";
    try {
        $res_unique_inverse = np::unique_inverse(np::array([1,2]));
        if ($res_unique_inverse instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_unique_inverse->getData()); } else { var_export($res_unique_inverse); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::unique_values()\n";
    try {
        $res_unique_values = np::unique_values(np::array([1,2]));
        if ($res_unique_values instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_unique_values->getData()); } else { var_export($res_unique_values); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::unsignedinteger()\n";
    try {
        $res_unsignedinteger = np::unsignedinteger();
        if ($res_unsignedinteger instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_unsignedinteger->getData()); } else { var_export($res_unsignedinteger); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::unstack()\n";
    try {
        $res_unstack = np::unstack(np::array([1,2]));
        if ($res_unstack instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_unstack->getData()); } else { var_export($res_unstack); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::unwrap()\n";
    try {
        $res_unwrap = np::unwrap(np::array([1,2]));
        if ($res_unwrap instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_unwrap->getData()); } else { var_export($res_unwrap); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::ushort()\n";
    try {
        $res_ushort = np::ushort();
        if ($res_ushort instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_ushort->getData()); } else { var_export($res_ushort); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::vander()\n";
    try {
        $res_vander = np::vander(np::array([1,2]));
        if ($res_vander instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_vander->getData()); } else { var_export($res_vander); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::var()\n";
    try {
        $res_var = np::var(np::array([1,2]));
        if ($res_var instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_var->getData()); } else { var_export($res_var); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::vecdot()\n";
    try {
        $res_vecdot = np::vecdot(np::array([1,2]), np::array([1,2]));
        if ($res_vecdot instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_vecdot->getData()); } else { var_export($res_vecdot); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::vecmat()\n";
    try {
        $res_vecmat = np::vecmat(np::array([1,2]), np::array([[3,4],[5,6]]));
        if ($res_vecmat instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_vecmat->getData()); } else { var_export($res_vecmat); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::vectorize()\n";
    try {
        $res_vectorize = np::vectorize(function($x){return $x;});
        if ($res_vectorize instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_vectorize->getData()); } else { var_export($res_vectorize); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::void()\n";
    try {
        $res_void = np::void();
        if ($res_void instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_void->getData()); } else { var_export($res_void); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::vsplit()\n";
    try {
        $res_vsplit = np::vsplit(np::array([1,2]), 1);
        if ($res_vsplit instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_vsplit->getData()); } else { var_export($res_vsplit); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::vstack()\n";
    try {
        $res_vstack = np::vstack([np::array([1]), np::array([2])]);
        if ($res_vstack instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_vstack->getData()); } else { var_export($res_vstack); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::where()\n";
    try {
        $res_where = np::where(np::array([1,2]), 1, 1);
        if ($res_where instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_where->getData()); } else { var_export($res_where); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::zeros()\n";
    try {
        $res_zeros = np::zeros([np::array([1]), np::array([2])]);
        if ($res_zeros instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_zeros->getData()); } else { var_export($res_zeros); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }
    echo "\nnp::zeros_like()\n";
    try {
        $res_zeros_like = np::zeros_like(np::array([1,2]));
        if ($res_zeros_like instanceof \NumPHP\Core\NDArray) { print_arr("Output:", $res_zeros_like->getData()); } else { var_export($res_zeros_like); echo "\n"; }
    } catch (Throwable $e) {
        echo 'Error: ' . $e->getMessage() . "\n";
    }

} catch (Exception $e) {
    error_log('Exception: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
    echo 'Ek error aayi: ' . $e->getMessage() . "\n";
}

echo "\nTest Script Finished.\n";

echo "</pre>";
