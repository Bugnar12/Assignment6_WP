function validateFile(file) {
    if (typeof file.title !== 'string' || file.title.trim() === '' || file.title.length < 3) {
        return 'Invalid title';
    }

    if (typeof file.format_type !== 'string' || file.format_type.trim() === '') {
        return 'Invalid format_type';
    }

    if (typeof file.genre !== 'string' || file.genre.trim() === '') {
        return 'Invalid genre';
    }

    //check so that file path has at least a / in it
    if (typeof file.path !== 'string' || file.path.trim() === '' || file.path.length < 1 || file.path.indexOf('/') === -1){
        return 'Invalid path';
    }

    // All validations passed
    return null;
}