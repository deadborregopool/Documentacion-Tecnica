# Installation of TypeScript (Step by Step)

## What is TypeScript?
TypeScript is a strongly typed programming language that builds on JavaScript, adding static type definitions. It helps developers catch errors early and write more robust, maintainable code.

## Steps to Install TypeScript

1. **Install Node.js and npm:**
   - Make sure Node.js and npm are installed on your system.
   - Verify their versions by running the following commands in your terminal:
     ```bash
     node -v
     npm -v
     ```

2. **Install TypeScript Globally:**
   - Use npm to install TypeScript globally on your system:
     ```bash
     npm install -g typescript
     ```

3. **Verify the Installation:**
   - Check if TypeScript is installed by running:
     ```bash
     tsc -v
     ```
   - This command displays the installed TypeScript version.

4. **Set Up TypeScript in a Project:**
   - Navigate to your project directory:
     ```bash
     cd your-project-directory
     ```
   - Initialize a new `tsconfig.json` file:
     ```bash
     tsc --init
     ```
   - This creates a configuration file to customize TypeScript behavior.

5. **Write and Compile TypeScript:**
   - Create a `.ts` file, for example, `index.ts`.
   - Write some TypeScript code inside the file:
     ```typescript
     const greet = (name: string): string => {
       return `Hello, ${name}!`;
     };

     console.log(greet("World"));
     ```
   - Compile the `.ts` file into JavaScript:
     ```bash
     tsc index.ts
     ```
   - This generates an `index.js` file in the same directory.

6. **Run the Compiled JavaScript:**
   - Use Node.js to execute the compiled JavaScript file:
     ```bash
     node index.js
     ```

## Optional: Install TypeScript Locally in a Project
- Instead of a global installation, you can install TypeScript locally in your project:
  ```bash
  npm install --save-dev typescript
