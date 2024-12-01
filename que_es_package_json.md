# What is `package.json`?

## Definition
`package.json` is a crucial file in Node.js projects. It contains project metadata, dependencies, scripts, and general configuration.

## What does it include?

1. **Project Metadata:**
   - Project name.
   - Project version.
   - Description.

2. **Dependencies:**
   - A list of packages the project needs to run (`dependencies`).
   - Development-only dependencies (`devDependencies`).

3. **Scripts:**
   - Custom commands you can run, such as `start` or `test`.

4. **Configuration:**
   - Specific options for modules or tools used in the project.

## How is it created?

1. **Manually:**
   - Create a `package.json` file and fill in the details manually.

2. **Automatically:**
   - Run the command `npm init` in the terminal.
   - Answer the interactive assistant's questions.

## Example of a `package.json`

```json
{
  "name": "my-project",
  "version": "1.0.0",
  "description": "An example of package.json",
  "main": "index.js",
  "scripts": {
    "start": "node index.js",
    "test": "echo \"Error: no test specified\" && exit 1"
  },
  "dependencies": {},
  "devDependencies": {}
}
