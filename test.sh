for f in *; do
    echo $f; file -b --mime-type $f
done
