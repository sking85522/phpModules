import numpy as np
import inspect
import pkgutil
import importlib

def list_functions(module, collected, prefix=""):
    """Recursively collect all functions from a module and its submodules."""
    for name in dir(module):
        try:
            attr = getattr(module, name)
            if inspect.isfunction(attr) or inspect.isbuiltin(attr):
                collected.append(prefix + name)
        except Exception:
            pass

    # अगर module के अंदर और submodules हैं तो उन्हें भी traverse करें
    if hasattr(module, "__path__"):  # package है
        for loader, submodule_name, ispkg in pkgutil.iter_modules(module.__path__):
            try:
                submodule = importlib.import_module(module.__name__ + "." + submodule_name)
                list_functions(submodule, collected, prefix=submodule.__name__ + ".")
            except Exception:
                pass

# Main execution
all_functions = []
list_functions(np, all_functions, "numpy.")

with open("NumPy_All_Functions.txt", "w", encoding="utf-8") as f:
    for func in sorted(set(all_functions)):
        f.write(func + "\n")

print("✅ NumPy के सभी submodules और उनके अंदर के functions 'NumPy_All_Functions.txt' में save हो गए हैं!")
