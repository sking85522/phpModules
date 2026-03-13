import os

# Define the base directory for NumPHP source code
BASE_DIR = 'modules/numphp/src'

# List of functions from NumPy (provided in the prompt)
numpy_functions = [
    "False_", "ScalarType", "True_", "_CopyMode", "_NoValue", "__NUMPY_SETUP__", "__all__", "__array_api_version__",
    "__array_namespace_info__", "__builtins__", "__cached__", "__config__", "__dir__", "__doc__", "__expired_attributes__",
    "__file__", "__former_attrs__", "__future_scalars__", "__getattr__", "__loader__", "__name__", "__numpy_submodules__",
    "__package__", "__path__", "__spec__", "__version__", "_array_api_info", "_core", "_distributor_init", "_expired_attrs_2_0",
    "_globals", "_int_extended_msg", "_mat", "_msg", "_pyinstaller_hooks_dir", "_pytesttester", "_specific_msg", "_type_info",
    "_typing", "_utils", "abs", "absolute", "acos", "acosh", "add", "all", "allclose", "amax", "amin", "angle", "any", "append",
    "apply_along_axis", "apply_over_axes", "arange", "arccos", "arccosh", "arcsin", "arcsinh", "arctan", "arctan2", "arctanh",
    "argmax", "argmin", "argpartition", "argsort", "argwhere", "around", "array", "array2string", "array_equal", "array_equiv",
    "array_repr", "array_split", "array_str", "asanyarray", "asarray", "asarray_chkfinite", "ascontiguousarray", "asfortranarray",
    "asin", "asinh", "asmatrix", "astype", "atan", "atan2", "atanh", "atleast_1d", "atleast_2d", "atleast_3d", "average", "bartlett",
    "base_repr", "binary_repr", "bincount", "bitwise_and", "bitwise_count", "bitwise_invert", "bitwise_left_shift", "bitwise_not",
    "bitwise_or", "bitwise_right_shift", "bitwise_xor", "blackman", "block", "bmat", "bool", "bool_", "broadcast", "broadcast_arrays",
    "broadcast_shapes", "broadcast_to", "busday_count", "busday_offset", "busdaycalendar", "byte", "bytes_", "c_", "can_cast",
    "cbrt", "cdouble", "ceil", "char", "character", "choose", "clip", "clongdouble", "column_stack", "common_type", "complex128",
    "complex256", "complex64", "complexfloating", "compress", "concat", "concatenate", "conj", "conjugate", "convolve", "copy",
    "copysign", "copyto", "core", "corrcoef", "correlate", "cos", "cosh", "count_nonzero", "cov", "cross", "csingle", "ctypeslib",
    "cumprod", "cumsum", "cumulative_prod", "cumulative_sum", "datetime64", "datetime_as_string", "datetime_data", "deg2rad",
    "degrees", "delete", "diag", "diag_indices", "diag_indices_from", "diagflat", "diagonal", "diff", "digitize", "divide", "divmod",
    "dot", "double", "dsplit", "dstack", "dtype", "dtypes", "e", "ediff1d", "einsum", "einsum_path", "emath", "empty", "empty_like",
    "equal", "errstate", "euler_gamma", "exceptions", "exp", "exp2", "expand_dims", "expm1", "extract", "eye", "f2py", "fabs", "fft",
    "fill_diagonal", "finfo", "fix", "flatiter", "flatnonzero", "flexible", "flip", "fliplr", "flipud", "float128", "float16",
    "float32", "float64", "float_power", "floating", "floor", "floor_divide", "fmax", "fmin", "fmod", "format_float_positional",
    "format_float_scientific", "frexp", "from_dlpack", "frombuffer", "fromfile", "fromfunction", "fromiter", "frompyfunc", "fromregex",
    "fromstring", "full", "full_like", "gcd", "generic", "genfromtxt", "geomspace", "get_include", "get_printoptions", "getbufsize",
    "geterr", "geterrcall", "gradient", "greater", "greater_equal", "half", "hamming", "hanning", "heaviside", "histogram",
    "histogram2d", "histogram_bin_edges", "histogramdd", "hsplit", "hstack", "hypot", "i0", "identity", "iinfo", "imag", "index_exp",
    "indices", "inexact", "inf", "info", "inner", "insert", "int16", "int32", "int64", "int8", "int_", "intc", "integer", "interp",
    "intersect1d", "intp", "invert", "is_busday", "isclose", "iscomplex", "iscomplexobj", "isdtype", "isfinite", "isfortran", "isin",
    "isinf", "isnan", "isnat", "isneginf", "isposinf", "isreal", "isrealobj", "isscalar", "issubdtype", "iterable", "ix_", "kaiser",
    "kron", "lcm", "ldexp", "left_shift", "less", "less_equal", "lexsort", "lib", "linalg", "linspace", "little_endian", "load",
    "loadtxt", "log", "log10", "log1p", "log2", "logaddexp", "logaddexp2", "logical_and", "logical_not", "logical_or", "logical_xor",
    "logspace", "long", "longdouble", "longlong", "ma", "mask_indices", "matmul", "matrix", "matrix_transpose", "matvec", "max",
    "maximum", "may_share_memory", "mean", "median", "memmap", "meshgrid", "mgrid", "min", "min_scalar_type", "minimum", "mintypecode",
    "mod", "modf", "moveaxis", "multiply", "nan", "nan_to_num", "nanargmax", "nanargmin", "nancumprod", "nancumsum", "nanmax",
    "nanmean", "nanmedian", "nanmin", "nanpercentile", "nanprod", "nanquantile", "nanstd", "nansum", "nanvar", "ndarray", "ndenumerate",
    "ndim", "ndindex", "nditer", "negative", "nested_iters", "newaxis", "nextafter", "nonzero", "not_equal", "number", "object_",
    "ogrid", "ones", "ones_like", "outer", "packbits", "pad", "partition", "percentile", "permute_dims", "pi", "piecewise", "place",
    "poly", "poly1d", "polyadd", "polyder", "polydiv", "polyfit", "polyint", "polymul", "polynomial", "polysub", "polyval", "positive",
    "pow", "power", "printoptions", "prod", "promote_types", "ptp", "put", "put_along_axis", "putmask", "quantile", "r_", "rad2deg",
    "radians", "random", "ravel", "ravel_multi_index", "real", "real_if_close", "rec", "recarray", "reciprocal", "record", "remainder",
    "repeat", "require", "reshape", "resize", "result_type", "right_shift", "rint", "roll", "rollaxis", "roots", "rot90", "round",
    "row_stack", "s_", "save", "savetxt", "savez", "savez_compressed", "sctypeDict", "searchsorted", "select", "set_printoptions",
    "setbufsize", "setdiff1d", "seterr", "seterrcall", "setxor1d", "shape", "shares_memory", "short", "show_config", "show_runtime",
    "sign", "signbit", "signedinteger", "sin", "sinc", "single", "sinh", "size", "sort", "sort_complex", "spacing", "split", "sqrt",
    "square", "squeeze", "stack", "std", "str_", "strings", "subtract", "sum", "swapaxes", "take", "take_along_axis", "tan", "tanh",
    "tensordot", "test", "testing", "tile", "timedelta64", "trace", "transpose", "trapezoid", "tri", "tril", "tril_indices",
    "tril_indices_from", "trim_zeros", "triu", "triu_indices", "triu_indices_from", "true_divide", "trunc", "typecodes", "typename",
    "typing", "ubyte", "ufunc", "uint", "uint16", "uint32", "uint64", "uint8", "uintc", "uintp", "ulong", "ulonglong", "union1d",
    "unique", "unique_all", "unique_counts", "unique_inverse", "unique_values", "unpackbits", "unravel_index", "unsignedinteger",
    "unstack", "unwrap", "ushort", "vander", "var", "vdot", "vecdot", "vecmat", "vectorize", "void", "vsplit", "vstack", "where",
    "zeros", "zeros_like"
]

# Mapping of functions to their respective categories/folders in NumPHP structure
category_map = {
    "Creation": [
        "array", "zeros", "ones", "full", "arange", "linspace", "logspace", "eye", "identity", "empty", "empty_like",
        "ones_like", "zeros_like", "full_like", "meshgrid", "mgrid", "ogrid", "tri", "tril", "triu", "vander", "mat", "bmat"
    ],
    "Math/Basic": [
        "add", "subtract", "multiply", "divide", "sqrt", "power", "abs", "absolute", "reciprocal", "sign", "negative",
        "mod", "fmod", "floor_divide", "remainder", "divmod", "float_power", "fmax", "fmin", "maximum", "minimum",
        "clip", "round", "around", "floor", "ceil", "trunc", "rint", "fix", "angle", "real", "imag", "conj", "conjugate",
        "i0", "sinc", "signbit", "copysign", "nextafter", "spacing", "ldexp", "frexp", "modf", "degrees", "radians", "deg2rad", "rad2deg", "unwrap"
    ],
    "Math/Trigonometry": [
        "sin", "cos", "tan", "arcsin", "arccos", "arctan", "arctan2", "hypot", "sinh", "cosh", "tanh", "arcsinh", "arccosh", "arctanh"
    ],
    "Math/Exponential": [
        "exp", "expm1", "exp2", "log", "log10", "log2", "log1p", "logaddexp", "logaddexp2"
    ],
    "Math/FloatingPoint": [
        "isnan", "isinf", "isfinite", "isneginf", "isposinf", "nan_to_num", "isclose", "allclose"
    ],
    "Math/Calculus": [
        "diff", "gradient", "ediff1d", "cross", "trapz", "trapezoid"
    ],
    "Math/Comparison": [
        "equal", "not_equal", "greater", "greater_equal", "less", "less_equal", "array_equal", "array_equiv"
    ],
    "Math/Logical": [
        "logical_and", "logical_or", "logical_not", "logical_xor", "all", "any"
    ],
    "LinearAlgebra": [
        "matmul", "dot", "vdot", "inner", "outer", "kron", "tensordot", "einsum", "einsum_path", "linalg", "matrix_power",
        "matrix_transpose", "trace", "det", "inv", "solve", "lstsq", "pinv", "cholesky", "qr", "svd", "eig", "eigh", "eigvals",
        "eigvalsh", "norm", "cond", "matrix_rank", "slogdet", "tensorinv", "tensorsolve", "diag", "diagflat", "tri", "tril", "triu"
    ],
    "Statistics": [
        "sum", "prod", "mean", "std", "var", "min", "max", "amin", "amax", "ptp", "percentile", "nanpercentile", "quantile",
        "nanquantile", "median", "average", "cov", "corrcoef", "correlate", "histogram", "histogram2d", "histogramdd", "bincount",
        "digitize", "nansum", "nanprod", "nanmean", "nanstd", "nanvar", "nanmin", "nanmax", "nanmedian", "nanargmin", "nanargmax",
        "cumsum", "cumprod", "nancumprod", "nancumsum"
    ],
    "ArrayManipulation": [
        "reshape", "ravel", "flatten", "transpose", "swapaxes", "moveaxis", "rollaxis", "concatenate", "stack", "vstack", "hstack",
        "dstack", "column_stack", "row_stack", "split", "array_split", "hsplit", "vsplit", "dsplit", "tile", "repeat", "delete",
        "insert", "append", "resize", "trim_zeros", "unique", "flip", "fliplr", "flipud", "reshape", "roll", "rot90",
        "expand_dims", "squeeze", "pad", "swapaxes", "copyto", "shape", "ndim", "size", "broadcast_to", "broadcast_arrays"
    ],
    "Indexing": [
        "where", "argwhere", "nonzero", "flatnonzero", "extract", "searchsorted", "place", "put", "take", "choose", "compress",
        "diagonal", "select", "take_along_axis", "put_along_axis", "indices", "ix_", "ravel_multi_index", "unravel_index", "diag_indices",
        "diag_indices_from", "mask_indices", "tril_indices", "tril_indices_from", "triu_indices", "triu_indices_from"
    ],
    "Sorting": [
        "sort", "argsort", "lexsort", "partition", "argpartition", "sort_complex", "msort"
    ],
    "SignalProcessing": [
        "fft", "ifft", "fft2", "ifft2", "fftn", "ifftn", "rfft", "irfft", "rfft2", "irfft2", "rfftn", "irfftn",
        "hfft", "ihfft", "fftshift", "ifftshift", "fftfreq", "rfftfreq", "convolve", "bartlett", "blackman", "hamming", "hanning", "kaiser"
    ],
    "Polynomial": [
        "poly", "roots", "polyint", "polyder", "polyval", "polyfit", "poly1d", "polyadd", "polysub", "polymul", "polydiv"
    ],
    "Random": [
        "rand", "randn", "randint", "random", "choice", "shuffle", "permutation", "seed"
    ],
    "Sets": [
        "unique", "in1d", "intersect1d", "isin", "setdiff1d", "setxor1d", "union1d"
    ],
    "IO": [
        "load", "save", "savetxt", "loadtxt", "genfromtxt", "fromregex", "fromstring", "array2string", "array_repr", "array_str",
        "format_float_positional", "format_float_scientific", "memmap"
    ],
    "Bitwise": [
        "bitwise_and", "bitwise_or", "bitwise_xor", "invert", "left_shift", "right_shift", "packbits", "unpackbits", "binary_repr"
    ],
     "Types": [
        "can_cast", "promote_types", "min_scalar_type", "result_type", "common_type", "obj2sctype", "rank", "dtype", "typename",
        "sctype2char", "mintypecode", "issubdtype", "issubsctype", "issubclass_", "find_common_type", "isdtype", "finfo", "iinfo"
    ],
    "DateTime": [
        "datetime_as_string", "datetime_data", "busday_count", "busday_offset", "is_busday", "busdaycalendar"
    ],
    "String": [
         "char", "add", "multiply", "mod", "capitalize", "center", "decode", "encode", "join", "ljust", "lower", "lstrip",
         "partition", "replace", "rfind", "rindex", "rjust", "rpartition", "rsplit", "rstrip", "split", "splitlines", "strip",
         "swapcase", "title", "translate", "upper", "zfill", "equal", "not_equal", "greater_equal", "less_equal", "greater", "less"
    ]
}

def to_pascal_case(snake_str):
    """Convert snake_case to PascalCase for class names."""
    return "".join(x.title() for x in snake_str.split("_"))

def create_file_structure():
    # Create base directory if it doesn't exist
    if not os.path.exists(BASE_DIR):
        print(f"Base directory {BASE_DIR} does not exist. Creating it.")
        os.makedirs(BASE_DIR, exist_ok=True)

    # Set to keep track of functions we've handled
    handled_functions = set()

    for category, functions in category_map.items():
        # Create category folder
        category_path = os.path.join(BASE_DIR, category)
        if not os.path.exists(category_path):
            os.makedirs(category_path, exist_ok=True)
            print(f"Created folder: {category_path}")

        for func_name in functions:
            # Check if this function is actually in our NumPy list (sanity check)
            if func_name not in numpy_functions and func_name not in ["diagflat", "tri", "vander", "mat", "bmat", "ptp"]: # Some aliases/helpers might not be in exact list
                 pass # Allow it, as map might be more comprehensive than the specific list provided

            # Class name strategy: PascalCase
            # Special handling for names ending in _ (like False_, True_, bool_) - remove trailing _
            clean_name = func_name.rstrip('_')
            
            # Some names are reserved in PHP (like 'List', 'Array', 'Function', 'Class', 'clone', 'print', 'echo')
            # But here we are making files like ArrayCreate.php or specific logic classes.
            # For simple function wrappers, we name the class usually the same as function in PascalCase.
            
            class_name = to_pascal_case(clean_name)
            
            # Conflict resolution: some files already exist with specific names.
            # We check if file exists. If it does, SKIP.
            
            file_path = os.path.join(category_path, f"{class_name}.php")
            
            if os.path.exists(file_path):
                print(f"Skipping existing file: {file_path}")
                handled_functions.add(func_name)
                continue

            # Determine namespace
            namespace_parts = category.split('/')
            namespace = "NumPHP\\" + "\\".join(namespace_parts)

            # Generate placeholder content
            content = f"""<?php

namespace {namespace};

use NumPHP\\Core\\NDArray;

class {class_name}
{{
    /**
     * {func_name}
     *
     * @param mixed ...$args
     * @return mixed
     */
    public static function {clean_name}(...$args)
    {{
        // TODO: Implement {func_name}
        throw new \\Exception("{func_name} not implemented yet.");
    }}
}}
"""
            # Write the file
            try:
                with open(file_path, "w") as f:
                    f.write(content)
                print(f"Created file: {file_path}")
                handled_functions.add(func_name)
            except Exception as e:
                print(f"Error creating file {file_path}: {e}")

    # Log functions that were in the input list but not mapped (for manual review)
    # Filter out dunder methods and private/internal attributes
    ignored_prefixes = ["__", "_"]
    remaining = []
    for f in numpy_functions:
        if f not in handled_functions:
            is_ignored = False
            for prefix in ignored_prefixes:
                if f.startswith(prefix):
                    is_ignored = True
                    break
            if not is_ignored:
                remaining.append(f)
    
    if remaining:
        print("\n--- Functions from list not categorized (skipped) ---")
        # Sort for readability
        remaining.sort()
        # Print in chunks
        chunk_size = 10
        for i in range(0, len(remaining), chunk_size):
             print(", ".join(remaining[i:i+chunk_size]))
        
        # Optional: Create a 'Misc' folder for these? 
        # For now, we just list them to avoid cluttering with unknowns.

if __name__ == "__main__":
    create_file_structure()